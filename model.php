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

   $current_env = get_next_env_id();
   $i = 0;
   foreach ($package_ids as $pid){
     $sql_relation = "INSERT INTO PACKAGE_ENV_RELATION(ENV_ID, PACKAGE_ID) VALUES($current_env, $pid)";
     mysqli_query($conn, $sql_relation);
     $i++;
   }


 }

function get_forum_post_array(){
    global $conn;

    $sql = "SELECT E.ENV_NAME, E.ENV_ID, U.USER_ID, U.USERNAME, F.POST_ID, F.DESCRIPTION, F.TIMESTAMP
                FROM ENVIRONMENT E JOIN FORUM_POST F
                    ON (E.ENV_ID = F.ENV_ID)
                JOIN USERS U
                    ON (U.USER_ID = F.USER_ID)";

    $result = mysqli_query($conn, $sql);
    $forum_array = [];

    /*
    0 = ENV_TITLE
    1 = ENV_ID
    2 = USER_ID
    3 = USER_NAME
    4 = POST_ID
    5 = DESCRIPTION
    6 = TIMESTAMP
    7 = PACKAGE ARRAY
    8 = INSTALL COMMAND
    9 = COMMENT ARRAY
    */


    // 0 = title 1 = envid 2 = userid 3 = username 4 = postid 5= description 6 = timestamp 7 = packagelist 8 = installcommand 9 = comments
    $i = 0;
    while($row = mysqli_fetch_row($result)){
        $forum_array[$i][0] = $row[0];
        $forum_array[$i][1] = $row[1];
        $forum_array[$i][2] = $row[2];
        $forum_array[$i][3] = $row[3];
        $forum_array[$i][4] = $row[4];
        $forum_array[$i][5] = $row[5];
        $forum_array[$i][6] = $row[6];
        $pack_sql = "SELECT P.PACKAGE_ID, P.PACKAGE_NAME, P.PACKAGE_COMMAND, P.PACKAGE_DESCRIPTION
      	          FROM PACKAGE P JOIN PACKAGE_ENV_RELATION PE
      	          ON (P.PACKAGE_ID = PE.PACKAGE_ID)
      	          WHERE PE.ENV_ID = " . $forum_array[$i][1];
        $pack_result = mysqli_query($conn, $pack_sql);
        $package_arr = [];
        $x = 0;
        $install_command = 'sudo apt-get install';
        while ($row = mysqli_fetch_row($pack_result)) {
          $package_arr[$x] = $row;
          $p_command = explode(",",$row[2]);
          if($p_command[1] == "pm"){
            // Uses package manager
            $install_command = $install_command . " " . $p_command[0];
          }
          $x++;
        }

        $forum_array[$i][7] = $package_arr;
        $forum_array[$i][8] = $install_command;


        $comm_sql = "SELECT U.USERNAME, C.COMMENT_CONTENT, C.TIMESTAMP
                        FROM USERS U JOIN FORUM_COMMENT C
                            ON (U.USER_ID = C.USER_ID)
                        JOIN FORUM_POST P
                            ON (P.POST_ID = C.POST_ID)
                        WHERE P.POST_ID = ".$forum_array[$i][4]."
                        ORDER BY C.FORUM_COMMENT_ID";
        $comm_result = mysqli_query($conn, $comm_sql);
        $comm_arr = [];
        if($comm_result !== false){
            $z = 0;
            while ($row = mysqli_fetch_row($comm_result)) {
                $comm_arr[$z++] = $row;
            }
        }
        $forum_array[$i][9] = $comm_arr;
        $i++;
    }
    return $forum_array;
}


function get_next_env_id(){
  global $conn;
  $sql = "SELECT MAX(ENV_ID) FROM ENVIRONMENT;";

  $result = mysqli_query($conn, $sql);

  $current_id = mysqli_fetch_row($result)[0];

  if($result){
    echo "Current id is ". $current_id;
  }
  else{
    echo "damnit";
  }

  return $current_id;
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


function add_comment($comment_content, $forum_post){
  global $conn;

  $user_id = $_COOKIE['USER_ID_COOK'];
  $date = new DateTime();
  $timestamp = $date->getTimestamp();

  echo "POSTING: $forum_post , $comment_content , $user_id , $timestamp";

  $sql = "INSERT INTO FORUM_COMMENT(POST_ID, USER_ID, COMMENT_CONTENT, TIMESTAMP)
            VALUES($forum_post, $user_id, '$comment_content', $timestamp)";
  $result = mysqli_query($conn, $sql);


  $_POST['comment_text'] = NULL;
  $_POST['forum_post_id'] = NULL;
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
