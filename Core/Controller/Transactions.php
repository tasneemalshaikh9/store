<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
//use Core\Helpers\Tests;
use Core\Model\Transaction;
use Core\Model\Selling;
use Core\Model\Item;
use Core\Model\User;


class Transactions extends Controller
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

    function index(){
        $this->permissions(['transaction:read']);
        $this->view = "transactions/index";
        $item = new Item;
        $this->data = $item->get_all();
        $transaction = new Transaction();
        $all_transactions = $transaction->get_all();
        $this->data['transactions'] = $all_transactions;
        $this->data['transactions_count'] = count($transaction->get_all());
        $_POST['user_id'] = $_SESSION['user']['user_id'];
        

    }
    public function single()
    {
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction();
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);
        $all_transactions = $transaction->get_all();
        $this->data['transactions'] = $all_transactions;


        //logged in user
        // $user = new User;
        // $current_user = $user->get_by_id();
        // $all = "SELECT * FROM transactions_users WHERE user_id=$current_user";
        // foreach($all as $trans_key => $trans){
        // $current_item = $item->get_by_id($item->item_id);

        // }

        // loop through each trans and replace user_id with the user_name

        // $user = new User();
        // $all_users = $user->get_all();
        // foreach ($all_users as $users_key => $user) {
        //     $this->data['user'] = $user->get_by_id($_GET['id']);
        //     $current_user = $user->get_by_id($user->user_id);
        //     $all_transactions[$users_key]->user_name = !empty($current_user) ? $current_user->user_name : null;
        //     unset($all_users[$users_key]->user_id);
        // }
        // $selected_user = $user->get_by_id($_GET['id']);
        // $selected_user->transactions = $transaction->get_all();
        // $this->data['user'] = $selected_user;

    }

    public function edit()
    {
        // edit single page
        $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transactions.edit';
        $transaction = new transaction();
        $this->data['transaction'] = $transaction->get_by_id($_GET['id']);




    }
    public function update(){

        // update single page
        $this->permissions(['transaction:read', 'transaction:update']);
        $transaction = new transaction();
        $transaction->update($_POST);
        Helper::redirect('/transactions');

    }
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }

}