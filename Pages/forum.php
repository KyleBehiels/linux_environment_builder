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
        <?php include('./Components/header.php'); ?>
        <link rel="stylesheet" href="./css/forum.css">
    </head>
    <body>
        <div class="container">
            <?php
                include('./Components/navigation.php');
             ?>
            <h1 class="text-center">L.E.B. Forum</h1>
            <hr>

            <?php
            $forum_posts = list_forum_posts();
            echo $forum_posts;
            ?>


        </div>
    </body>
</html>
