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

function signup(){
    if($_POST['PASSWORD'] == $_POST['PASS_CONF']){
        insert_new_user($_POST['USERNAME'], $_POST['PASSWORD'], $_POST['EMAIL']);

        // By not adding a timeout, cookie will destruct on browser close  
        setcookie("USER_ID_COOK", get_userid($_POST['USERNAME']));
    }
    else{
        setcookie("USER_ID_COOK", 'failed');
    }
}
function login(){
    if(does_exist($_POST['USERNAME'])){
        if(get_password($_POST['USERNAME']) == $_POST['PASSWORD']){
            setcookie("USER_ID_COOK", get_userid($_POST['USERNAME']));
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

