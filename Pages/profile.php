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
            Linux Environment Builder
        </title>
        <?php include('./Components/header.php') ?>
        <link rel="stylesheet" href="./css/profile.css">
        <script src="./Scripts/profile.js"></script>
    </head>
    <body>
        
        <div class="container">
            <?php include("./Components/navigation.php") ?>
            <h1 class="text-center">Profile Page</h1>
            <div class="col-sm-12 text-center">
                <div class="btn-group">
                    <button class="btn btn-lg btn-primary">Log in</button>
                    <button class="btn btn-lg btn-primary">Signup</button>
                </div>
            </div>
        </div>
    </body>
    
    <div class="hidden" id="log_in_modal">
        <form>
            <input class="form-control" type="text" placeholder="Username"><br/>
            <input class="form-control" type="password" placeholder="Password"><br/>
        </form>
    </div>
    <div class="hidden" id="sign_up_modal">
        <form class="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Username"><br/>
                <input class="form-control" type="email" placeholder="Email"><br/>
                <input class="form-control" type="password" placeholder="Password"><br/>
                <input class="form-control" type="password" placeholder="Confirm Password"><br/>
            </div>
        </form>
    </div>
</html>