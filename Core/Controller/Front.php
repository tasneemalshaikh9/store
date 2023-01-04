<?php

namespace Core\Controller;

use Core\Base\Controller;
 use Core\Model\Item;
use Core\Model\User;
 use DateTime;

class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
    }

    /**
     * List all Items
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'login';
         $item = new Item();
         $this->data['items'] = $item->get_all();
    }
    public function single()
    { 
         $this->view = 'single';
         $item = new Item();
         $this->data['item'] = $item->get_by_id($_GET['id']);
        // $selected_item = $item->get_by_id($_GET['id']); 
     
       
        }
        // public function user(){
        //     $this->view = 'user';
        // $user = new User();

        // }

      
    
}
