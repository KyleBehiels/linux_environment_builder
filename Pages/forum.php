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
        <script type="text/javascript" src="./Scripts/forum.js">

        </script>
        <link rel="stylesheet" href="./css/forum.css">
    </head>
    <body>
        <div class="container">
            <?php include('./Components/navigation.php') ?>

            <h1 class="text-center">L.E.B. Forum <button class="btn btn-primary" onclick="show_create_form()">New Post</button></h1>
            <hr>
            <div id="add_post_form" class="hidden">
              <form action="controller.php" method="post">
                <div class="form-group">
                    <label for="environment">Environment</label>
                    <select class="form-control" name="environment">
                      <option value="env_one_id">Environment One</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input class="form-control" type="text" name="description" value="" placeholder="Description...">
                </div>
                <div class="text-center form-group">
                  <input type="submit" class="btn btn-primary" name="submitform" value="Submit">
                </div>
              </form>
            </div>
            <?php
            $forum_posts = list_forum_posts();
            echo $forum_posts;
             ?>
        </div>
    </body>
</html>
