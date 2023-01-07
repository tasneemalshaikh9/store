<?php

use Core\Helpers\Helper;
use Core\Model\User; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid ">
            
            <a class="navbar-brand p-2" href="">
            <img src="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/images/logoo.png">
            </a>
          
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                     $iduser =$_SESSION['user']['user_id'];
                     $user = new User();
                     $user_display_name =$user->get_by_id($iduser);
                     ?> 
                  
                    <li class="nav-item active">
                        <div id="navdisplay">
                   <i>    <a  class="navbar-brand" href="/users/profile?id=<?= $_SESSION['user']['user_id'] ?>" ><?=$user_display_name->displayname?>  <i class="fa-solid fa-lock-open"></i></a></i> 
                        </div>
                    </li>
            
                </ul>
    
            </div>
      
            </div>
        
    </nav>

    <div id="admin-area" class="row">
        <div class="col-2 admin-links">
            <ul class="list-group list-group-flush mt-3">
            <!-- <div class="dashboard"> -->
                    <?php if (Helper::check_permission(['user:read'])) : ?>
                        <li class="list-group-item">
                            <a class="nav-link" href="/dashboard"><i class="fa-solid fa-house"></i> Dashboard</a>
                        </li>  
                      
                     
                        <?php  endif;?>
                          

                <?php if (Helper::check_permission(['selling:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/sellings"><i class="fa-solid fa-plus"></i> Selling dashboard</a>
                    </li>
                <?php  endif;
                      if (Helper::check_permission(['item:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/items"> <i class="fa-solid fa-cart-shopping"></i> Stock management page</a>
                    </li>
                <?php endif;
                    if (Helper::check_permission(['transaction:read'])) : ?>
                    <li class="list-group-item">
                        <a href="/transactions"><i class="fa-solid fa-table"></i> Accountants page</a>
                    </li>
                <?php  endif;?>
                <li class="list-group-item">
                            <a class="nav-link" href="/users/profile?id=<?= $_SESSION['user']['user_id'] ?>"><i class="fa-solid fa-user"></i> Profile</a>
                        </li>
                       
                   <?php  if (Helper::check_permission(['user:read'])) :
                ?>
                    <li class="list-group-item">
                        <a href="/users"> <i class="fa-solid fa-users"></i> Users’ management page</a>
                    </li>
            
                <?php  endif;?>
               
                <li class="list-group-item"> <a href="/logout"> <i class="fa-sharp fa-solid fa-arrow-right-from-bracket">
                </i> Logout</a>
            
            </li>
           
            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">