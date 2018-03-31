<?php

header('Access-Control-Allow-Origin: *');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// Include the landing page by default

if(!isset($_POST['page'])){
    include('./Pages/landing_page.php');
}
else{
    if($_POST['page'] == 'landing_page'){
        include('./Pages/landing_page.php');
    }
    if($_POST['page'] == 'forum'){
        include('./Pages/forum.php');
    }
    if($_POST['page'] == 'environments'){
        include('./Pages/environments.php');
    }
    if($_POST['page'] == 'profile'){
        include('./Pages/profile.php');
    }

}



?>
