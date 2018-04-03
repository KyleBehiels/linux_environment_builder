<?php

$server_name = "localhost";
$username = "kbehielsw7";
$password = "kbehielsw7424";


$conn = mysqli_connect($server_name, $username, $password, "COMP3540_kbehiels");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 function post_new_env($package_ids, $env_title, $env_description){
   global $conn;

   $sql_env = "INSERT INTO ENVIRONMENT(ENV_NAME, CREATOR_ID, ENV_DESCRIPTION) VALUES(' $env_title ' , '$_COOKIE[USER_ID_COOK]' ,'$env_description')";

   mysqli_query($conn, $sql_env);

   $current_env = get_env_by_name($env_title);
   $i = 0;
   foreach ($package_ids as $pid){
     $sql_relation = "INSERT INTO PACKAGE_ENV_RELATION(ENV_ID, PACKAGE_ID) VALUES($current_env, $pid)";
     mysqli_query($conn, $sql_relation);
     $i++;
   }


 }
function get_env_by_name($env_name){
  global $conn;

  $sql = "SELECT ENV_ID FROM ENVIRONMENT WHERE ENV_NAME = ".$env_name;

  $result = mysqli_query($conn, $sql);

  return mysqli_fetch_row($result)[0];
}

// This function is mostly borrowed from w8_seminar with few changes.
function insert_new_user($username, $password, $email)
{
    global $conn;

    if (does_exist($username))
        return false;
    else {
        $sql = "INSERT INTO USERS(USER_ID, USERNAME, PASSWORD, EMAIL) VALUES(NULL, '$username', '$password', '$email')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

// This function is mostly borrowed from w8_seminar with few changes.
function is_valid($username, $password)
{
    global $conn;

    $sql = "select * from USERS where (USERNAME = '$username' and PASSWORD = '$password')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

// This function is mostly borrowed from w8_seminar with few changes.
function does_exist($username)
{
    global $conn;

    $sql = "select * from USERS where (USERNAME = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function get_userid($username)
{
    global $conn;

    $sql = "select * from USERS where (USERNAME = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['USER_ID'];
    }
    else
        return -1;
}

function get_password($username)
{
    global $conn;

    $sql = "select * from USERS where (USERNAME = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['PASSWORD'];
    }
    else
        return -1;
}

function fetch_all($sql_result, $result_type = MYSQL_BOTH){
  $rows = array();
        while ($row = mysql_fetch_array($sql_result, $result_type))
        {
            $rows[] = $row;
        }
        return $rows;
}

function get_env_array($username){
  global $conn;

  $user_cond = '';

  if ($username !== "ALL") {
    $user_id = get_userid($username);
    $user_cond = "WHERE CREATOR_ID = ".$user_id.";";
  }

  $sql = "SELECT ENV_ID, ENV_NAME, ENV_DESCRIPTION FROM ENVIRONMENT ".$user_cond;
  $result = mysqli_query($conn, $sql);
  $env_array = [];
  $i = 0;
  while ($row = mysqli_fetch_row($result)) {
    $env_array[$i++] = $row;
  }
  $i = 0;

  foreach ($env_array as $env) {
    $sql = "SELECT P.PACKAGE_ID, P.PACKAGE_NAME, P.PACKAGE_COMMAND, P.PACKAGE_DESCRIPTION
  	          FROM PACKAGE P JOIN PACKAGE_ENV_RELATION PE
  	          ON (P.PACKAGE_ID = PE.PACKAGE_ID)
  	          WHERE PE.ENV_ID = " . $env[0];
    $result = mysqli_query($conn, $sql);
    $package_arr = [];
    $x = 0;
    $install_command = 'sudo apt-get install';
    while ($row = mysqli_fetch_row($result)) {
      $package_arr[$x] = $row;
      $p_command = explode(",",$row[2]);
      if($p_command[1] == "pm"){
        // Uses package manager
        $install_command = $install_command . " " . $p_command[0];
      }
      $x++;
    }
    $env_array[$i][4] = $install_command;
    $env_array[$i++][3] = $package_arr;
  }

  // $env_array at 0 = id 1 = name 2 = description 3 = package_list_array 4 = install command
  // $package_arr at 0 = PACKAGE_ID 1 = PACKAGE_NAME 2 = PACKAGE_COMMAND 3 = PACKAGE_DESCRIPTION

  return $env_array;

}


function get_all_packages(){

  global $conn;

  $sql = "SELECT * FROM PACKAGE";
  $result = mysqli_query($conn, $sql);

  $package_array = [];
  $i = 0;
  while ($row = mysqli_fetch_row($result)) {
    $package_array[$i][0] = $row[0]; // Package ID
    $package_array[$i][1] = $row[1]; // Package Name
    $package_array[$i][2] = $row[2]; // Package Command
    $package_array[$i][3] = $row[3]; // Package Description
    $i++;
  }

  return $package_array;

}


function signup(){
    if($_POST['PASSWORD'] == $_POST['PASS_CONF']){
        echo insert_new_user($_POST['USERNAME'], $_POST['PASSWORD'], $_POST['EMAIL']);

        // By not adding a timeout, cookie will destruct on browser close
        setcookie("USER_ID_COOK", get_userid($_POST['USERNAME']));
        setcookie("USERNAME_COOK", $_POST['USERNAME']);
    }
    else{
        setcookie("USER_ID_COOK", 'failed');
    }
}
function login(){
    if(does_exist($_POST['USERNAME'])){
        if(get_password($_POST['USERNAME']) == $_POST['PASSWORD']){
            setcookie("USER_ID_COOK", get_userid($_POST['USERNAME']));
            setcookie("USERNAME_COOK", $_POST['USERNAME']);
        }
        else{
            setcookie("USER_ID_COOK", 'failed');
        }
    }
    else{
        setcookie("USER_ID_COOK", 'failed');
    }
}


?>
