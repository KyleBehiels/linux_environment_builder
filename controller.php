<?php

header('Access-Control-Allow-Origin: *');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require("./model.php");


//Handle AUTH related posts

if(isset($_POST['AUTH_TYPE'])){
    
    if(!empty($_POST['AUTH_TYPE']))
    {
    if($_POST['AUTH_TYPE'] == 'LOGIN'){
        login();
    }
    if($_POST['AUTH_TYPE'] == 'SIGNUP'){
        signup();
    }
}
    
}


// Include the landing page by default

if(!isset($_POST['page'])){
    include('./Pages/landing_page.php');
    exit();
}

// Handle navigation

if($_POST['page'] == 'landing_page'){
    include('./Pages/landing_page.php');
    exit();
}
if($_POST['page'] == 'forum'){
    include('./Pages/forum.php');
    exit();
}
if($_POST['page'] == 'environments'){
    include('./Pages/environments.php');
    exit();
}
if($_POST['page'] == 'profile'){
    include('./Pages/profile.php');
    exit();
}
if($_POST['page'] == 'logout'){
    setcookie('USER_ID_COOK', null);
    include('./Pages/landing_page.php');
    exit();
}




?>
