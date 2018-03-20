<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>


<html>
    <head>
        <title>
            Forum
        </title>
        <?php include('./Components/header.php') ?>
        <link rel="stylesheet" href="./css/forum.css">
    </head>
    <body>
        <div class="container">
            <?php include('./Components/navigation.php') ?>
            <h1 class="text-center">L.E.B. Forum</h1>
            <hr>
            <div class="forum_post">
                <div class="text-center">
                    <h3>Post Title Goes Here | <button class="btn btn-primary">Go to environment</button></h3>
                </div>
                <hr>
                <div class="">
                    <p>Post content goes here. This is where there will be a description regarding what the environment is for as well as a button for going to the environment specified in the post.</p>
                </div>
                <hr>
                <div class="environment_details">
                    <h4>Program List</h4>
                    <table class="table">
                        <tr>
                            <th>Package</th>
                            <th class="hide_on_mobile">Function</th>
                            <th class="hide_on_mobile">Size</th>
                        </tr>
                        <tr>
                            <td>Atom</td>
                            <td class="hide_on_mobile">Customizable and powerful text editor</td>
                            <td class="hide_on_mobile">15mb</td>
                        </tr>
                        <tr>
                            <td>Chrome</td>
                            <td class="hide_on_mobile">Google's web browser</td>
                            <td class="hide_on_mobile">30mb</td>
                        </tr>
                        <tr>
                            <td>gedit</td>
                            <td class="hide_on_mobile">Simple and powerful text editor</td>
                            <td class="hide_on_mobile">3mb</td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="comments">
                    <span>UserName: This is the users comment</span><br>
                    <span>UserTwo: This is another users comment</span>
                </div>
                
            </div>
        </div>
    </body>
</html>