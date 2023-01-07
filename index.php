<?php
 session_start();
//use Core\Helpers\Fake;
use Core\Model\User;
use Core\Router;
require_once 'vendor/autoload.php'; //include to library

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});
// $faker = Faker\Factory::create();
// var_dump($faker->name());


  // This code will run only at the first time of using the app.
// Fake::is_first_time();


// For public access
 //Fake::create_users(1);

Router::get('/', 'front.index'); // Display home.php
//Router::get('/front/item', 'front.single');


Router::get('/login', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form
// athenticated+ permissions [dashboard:read]
Router::get('/dashboard', "admin.index"); // Displays the admin dashboard

//Router::get('/home', "home.index");

// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of items (HTML)
Router::get('/item', "items.single"); // Displays single item (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the items (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the items (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the item (PHP)


// athenticated + permissions [selling:read]
Router::get('/sellings', "sellings.index"); // list of sellings (HTML)
// Router::get('/selling', "sellings.singsle"); // Displays singsle item (HTML)
// athenticated + permissions [selling:create]
Router::get('/sellings/create', "sellings.create"); // Display the creation form (HTML)
Router::post('/sellings/store', "sellings.store"); // Creates the sellings (PHP)
// athenticated + permissions [selling:read, selling:create]
Router::get('/sellings/edit', "sellings.edit"); // Display the edit form (HTML)
Router::post('/sellings/update', "sellings.update"); // Updates the sellings (PHP)
// athenticated + permissions [selling:read, selling:detele]
Router::get('/sellings/delete', "sellings.delete"); // Delete the selling (PHP)


// this route is just for text the ajax
//Router::get('/sellings/ajax', 'sellings.ajax');



// athenticated + permissions [item:read]
Router::get('/transactions', "transactions.index"); // list of transactions (HTML)
Router::get('/transaction', "transactions.single"); // Displays single item (HTML)
// athenticated + permissions [transaction:create]
Router::get('/transactions/create', "transactions.create"); // Display the creation form (HTML)
Router::post('/transactions/store', "transactions.store"); // Creates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the transactions (PHP)
// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the transaction (PHP)


// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single user (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:detele]
Router::get('/users/delete', "users.delete"); // Delete the user (PHP)

Router::get('/users/profile', "users.profile"); // Display the profile (HTML)
Router::get('/users/profiledit', "users.profiledit"); // Display the profile edit(HTML)
Router::get('/users/updateprofile', "users.updateprofile"); 


// api requests
Router::get('/api/items', 'endpoints.items');
Router::post('/api/transaction/create', 'endpoints.transaction_create');
Router::post('/api/transaction/edit', 'endpoints.transaction_edit');




Router::redirect();