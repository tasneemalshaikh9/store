<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
//use Core\Helpers\Tests;
use Core\Model\Selling;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;

//use Core\Model\Tag;

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
        $this->permissions(['selling:read']);
        $this->view = "sellings/index";
        $item = new Item;
        
        $this->data['items'] = $item->get_all();
        $transaction = new Transaction();
        $all_transactions = $transaction->get_all();

        $User = new User();
        // loop through each trans and replace item_id with the item_name
        foreach($all_transactions as $trans_key => $trans){
            $current_item = $item->get_by_id($trans->item_id);
            $all_transactions[$trans_key]->item_name = !empty($current_item) ? $current_item->item_name : null;
            unset($all_transactions[$trans_key]->item_id);
        }


        // you need to pass only transation that has been created today, and belongs to the current logged in user.
        $this->data['transactions'] = $all_transactions;
        $_POST['user_id'] = $_SESSION['user']['user_id'];


        /////////////////////////////////
        // $transaction = new Transaction();
        // $transaction_id = $_POST['id'];
        // $trans_users = $_POST['users'] ?? null;
        // if (!empty($trans_users)) {
        //     foreach ($trans_users as $user_id) {
        //         $sql = "INSERT INTO transactions_users (transaction_id, user_id) VALUES ($transaction_id, $user_id)";
        //         $transaction->connection->query($sql);
        //     }
        // }
       

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

         //- stock from items table.
         $item = new Item();
         $item->update($_POST);
         $current_item = $item->get_by_id($_POST['id']);
         $current_item->quantity = $current_item->stock_available - $this->request_body->quantity;
         $item -> update($current_item);
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
    
