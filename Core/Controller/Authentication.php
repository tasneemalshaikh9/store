<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Authentication extends Controller
{
        private $user = null;

        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->admin_view(false);
                if (isset($_SESSION['user']))
                        Helper::redirect('/dashboard');
        }

        /**
         * Displays login form
         *
         * @return void
         */
        public function login()
        {
                $this->view = 'login';
        }

        /**
         * Login Validation
         *
         * @return void
         */
        public function validate()
        {
                 // if user doesn't exists, do not authenticate
                 $user = new User();
                 
                 $logged_in_user = $user->check_username($_POST['username']);
                 
                 if (!$logged_in_user) {
                        $this->invalid_redirect();
                }

                
                // if (!\password_verify($_POST['password'], $logged_in_user->password)) {
                //         $this->invalid_redirect();
                // }




                if (isset($_POST['remember_me'])) {
                        // DO NOT ADD USER ID TO THE COOKIES - SECURITY BREACH!!!!!
                        \setcookie('user_id', $logged_in_user->id, time() + (86400 * 30)); // 86400 = 1 day (60*60*24)
                }
                $_SESSION['user'] = array(
                        'username' => $logged_in_user->username,
                        'displayname' => $logged_in_user->displayname,
                        'user_id' => $logged_in_user->id,
                        'is_admin_view' => true
                );
                $permissions = \unserialize($logged_in_user->permissions);
                var_dump($permissions);
                if(in_array('user:read', $permissions)){
                        Helper::redirect('/dashboard');
                die;
                 }
                 if(in_array('selling:read', $permissions)){
                        Helper::redirect('/sellings');
                        die;
                         }
                 if(in_array('item:read', $permissions)){
                        Helper::redirect('/items');
                        die;
                                 }
                if(in_array('transaction:read', $permissions)){
                        Helper::redirect('/transactions');
                        die;
                                         }
        }

        public function logout()
        {
                \session_destroy();
                \session_unset();
                \setcookie('user_id', '', time() - 3600); // destroy the cookie by setting a past expiry date
                Helper::redirect('/');
        }

        private function invalid_redirect()
        {
                $_SESSION['error'] = "Invalid Username or Password";
                Helper::redirect('/login');
                exit();
        }
}
// item:read,item:create,item:update,item:delete,selling:read,selling:create,selling:update,selling:delete,user:read,user:create,
// user:update,user:dalete,transaction:read,transaction:update,transaction:delete