<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Item;
use Core\Model\Transaction;
use Core\Model\User;

class Admin extends Controller
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

        public function index()
        {
              //$this->permissions(['dashboard:read']);
                $this->view = 'dashboard';
                 $item = new Item;
                 $this->data['items'] = $item->get_all();
                 $this->data['items_count'] = count($item->get_all());
        
                $user = new User;
                // $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());



                $transaction = new Transaction();
                // $all_transactions = $transaction->get_all();
                // $this->data['transactions'] = $all_transactions;
                
                $this->data['transactions_count'] = count($transaction->get_all());
                $total = 0;
                $all_sales =$transaction->get_all();
                foreach($all_sales as $sales){
                        $total = $total + $sales->total;
                }
                $this->data['total'] = $total;

                $this->data['items'] = $item->top();

           //     var_dump($item);
        }
}
