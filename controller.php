<!DOCTYPE html>
<html lang="en" dir="ltr"> <head>
  <script type="text/javascript" src="./Scripts/main.js">

  </script>
</head> </html>

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

function list_environments($username){
    $envArray = get_env_array($username);
    $returnable = '';
    $i = 0;
    foreach ($envArray as $env) {

      $packages = '';

      foreach ($env[3] as $package) {
        $packages = $packages . '<tr><td>'.$package[1].'</td><td  class="hide_on_mobile">'.$package[3].'</td></tr>';
      }

      $returnable = $returnable .
      '
      <div class="col-sm-12 custom_environment">
        <h2 class="text-center">' . $env[1] . '</h2>
        <hr>
        <h3 class="text-center">Packages</h3>
        <div class="text-center">
          <table class="table">
            <tr>
              <th align="center">Name</th>
              <th class="hide_on_mobile" align="center">Description</th>
            </tr>
            <tr>
              '. $packages .'
            </tr>
          </table>
        </div>
        <hr>
        <div class="col-sm-12 text-center">
          <button onclick="show_script(environment_'. $env[0] .')" class="btn btn-primary" type="button" name="button">Get Bash Script</button>
        </div>
        <hr>
        <div id="environment_'. $env[0] .'" class="hidden text-center">
          <p class="code">'. $env[4] .'</p>
        </div>
      </div>
      ';
    }
    return $returnable;
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
    setcookie('USERNAME_COOK', null);
    include('./Pages/landing_page.php');
    header("Refresh:0");
    exit();
}




?>
