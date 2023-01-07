<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;


class Items extends Controller
{

    use Tests;
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
        $this->permissions(['item:read']);
        $this->view = "items/index";
        $item = new Item; // new model post.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }
    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

        $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new Item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Display the HTML form for creat creation
     *
     * @return void
     */
    public function create()
    {
       $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void 
     */
    public function store()
    {
        $this->permissions(['item:create']);
        $item = new Item();
       // $_POST['id'] = $_SESSION['user']['user_id']; // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $item->create($_POST);
        Helper::redirect('/items');
    }

    
    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new Item();
       // $tag = new Tag();
       // $selected_item->tags = $tag->get_all();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']);
        $item = new item();
       // $item_id = $_POST['id'];
        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new Item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}
