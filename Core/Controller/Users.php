<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
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
        /**
         * Gets all users
         *
         * @return array
         */
        function index(){
                $this->permissions(['user:read']);
                $this->view = "users/index";
                $user = new User; // new model user.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
            }
            function profile(){
                $this->view = "users.profile";
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
              
            }
            function profiledit(){
                $this->view = "users.profiledit";
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
              
            }
            function updateprofile(){
                $user = new User();
                $user->update($_POST);
                Helper::redirect('/profile?id=' . $_POST['id']);
              
            }
          

        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        // /**
        //  * Display the HTML form for user creation
        //  *
        //  * @return void
        //  */
        public function create()
        {
               $this->permissions(['user:create']);
                $this->view = 'users.create';
        }

        /**
        * Creates new user
        *
        * @return void
        */
        public function store()
        {
                $this->permissions(['user:create']);
                $user = new User();
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->create($_POST);
                Helper::redirect('/users');
                $_POST['displayname"'] = \htmlspecialchars($_POST['displayname"']);
                $_POST['email'] = \htmlspecialchars($_POST['email']);
                $_POST['username'] = \htmlspecialchars($_POST['username']);
                $_POST['password'] = \htmlspecialchars($_POST['password']);
        }

        /**
         * Display the HTML form for user update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Updates the user
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'seller':
                                $permissions = User::SEELER ;   
                                break;
                        case 'procurment':
                                $permissions = User::PROCURMENT;    
                                break;
                        case 'accountant':
                                $permissions = User::ACCOUNTANT;    
                                break;
                }
                unset($_POST['role']);
              // $_POST['permissions'] = implode(',', $permissions);
                $_POST['permissions'] = \serialize($permissions);
              // $user_id = $_POST['id'];
              $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
         }

        /**
         * Delete the user
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
        
}
