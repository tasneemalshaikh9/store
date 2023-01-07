<?php

namespace Core\Controller;

use Exception;
use Core\Model\Item;
use Core\Helpers\Tests;
use Core\Model\Selling;
use Core\Helpers\Helper;
use Core\Base\Controller;
use Core\Model\Transaction;

class Endpoints extends Controller
{
        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true,
                // to provide the response status.
                "message_code" => "",
                // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));
        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }
        public function items()
        {
                try {
                        $item = new Item;
                        $items = $item->get_all();
                        if (empty($items)) {
                                throw new \Exception('No items were found!');
                        }
                        $this->response_schema['body'] = $items;
                        $this->response_schema['message_code'] = "items_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }
        }
        function transaction_create()
        {
                self::check_if_empty($this->request_body);
                try {
                        $item = new Item;
                        $current_item = $item->get_by_id($this->request_body['item_id']);
                        $total = $current_item->price * $this->request_body['quantity'];


                        $transaction = new Transaction;
                        $transaction->create(array(
                                'item_id' => $this->request_body['item_id'],
                                'quantity' => $this->request_body['quantity'],
                                'total' => $total,

                        ));


                        //logged-in-user
                        $transactions = $transaction->get_by_id($transaction->connection->insert_id);
                        $user_id = $this->request_body['user_id'];
                        $stm=$transaction->connection->query("INSERT INTO transactions_users(transaction_id,user_id)values($transactions->id,$user_id)");
                   

                        // - stock from items table 
                        $item_id = $this->request_body['item_id'];
                        $quantity= $this->request_body['quantity'];
                        $operation =  $current_item->stock_available - $quantity;
                        $result_stock = $item->connection->query("UPDATE items SET stock_available = $operation WHERE id=$item_id ");



                        

                        ////////////////////////////////////////////////////////////
                        $this->response_schema['message_code'] = "item_created_successfuly";
                        $this->response_schema['body'] = array(
                                'item' => $current_item->item_name,
                                'quantity' => $this->request_body['quantity'],
                                'total' => $total
                        );
                } catch (\Exception $error) {
                        $this->response_schema['message_code'] = "item_was_not_created";
                        $this->http_code = 421;
                }
        }

        function transaction_edit()
        {  
                $transaction = new Transaction;
                $trans_id = $this->request_body['transaction_id'];
                $quantity= $this->request_body['quantity'];

                $result_edit = $transaction->connection->query("UPDATE transactions SET quantity = $quantity WHERE id=$trans_id ");
                Helper::redirect('/sellings');
        
              //  $this->response_schema['body'] = $this->request_body;

                var_dump($quantity);
                var_dump($trans_id);

                
        }
}