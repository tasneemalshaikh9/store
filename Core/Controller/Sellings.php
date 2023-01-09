<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Selling;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;



class Sellings extends Controller
{


    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    function index()
    {
        $date_now = date("m/d/Y");
    
        $this->permissions(['selling:read']);
        $this->view = "sellings.index";
        $item = new Item;
        
        $this->data['items'] = $item->get_all();
        $transaction = new Transaction();
         $user_id = $_SESSION['user']['user_id'];
         $current_trans =$transaction->connection->prepare("SELECT  users.id as user_to_id , transactions.*,items.item_name as item_name FROM `transactions_users` INNER JOIN transactions ON transactions_users.transaction_id = transactions.id INNER JOIN users ON transactions_users.user_id =users.id INNER JOIN items ON items.id = transactions.item_id WHERE transactions_users.user_id = $user_id");
              //    $current_trans->bind_param('i', $user_id);
                  $current_trans->execute();
                 $result_transaction = $current_trans->get_result();
       $data= array();
        foreach ($result_transaction as $res) {
            $date = new \DateTime($res['created_at']);
            $res['created_at'] = $date->format('m/d/Y');
            if ($date_now == $res['created_at']) {
                array_push($data, $res);
            }
        }

   
    $this->data['transactions'] =  $data;
       

        //total sales
        $total = 0;
        $all_sales =$transaction->get_all();
        foreach($all_sales as $sales){
                $total = $total + $sales->total;
        }
        $this->data['total'] = $total;
         
        
       
    }




    public function edit()
    {
         $this->permissions(['selling:read', 'selling:update']);
         //$this->view = '/sellings';
         $selling = new Selling();
         $transaction = new Transaction();
         $this->data['transaction'] = $transaction->get_by_id($_GET['id']);

    }
        /**
         * Updates the selling
         *
         * @return void
         */
        public function update()
        {
                $transaction = new Transaction();
                $transaction->update($_POST);
                Helper::redirect('/sellings');
      
       
         }


         
    public function delete()
    {
            $selling = new Selling();
            $transaction = new Transaction();
            $transaction->delete($_GET['id']);
            Helper::redirect('/sellings');
    }

   








             }
    