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
            <hr>
            <?php
                if(!isset($_COOKIE['USER_ID_COOK']) || $_COOKIE['USER_ID_COOK'] == "failed"){
                    echo
                    '
                        <div class="col-sm-12 text-center">
                            <div class="btn-group">
                                <button id="login_btn" class="btn btn-lg btn-primary">Log in</button>
                                <button id="signup_btn" class="btn btn-lg btn-primary">Signup</button>
                            </div>
                        </div>
                        <hr>
                        <div class="profile_form" id="login_form">
                            <form action="./controller.php" method="post">
                                <input type="hidden" name="AUTH_TYPE" value="LOGIN">
                                <input class="form-control" name="USERNAME" type="text" placeholder="Username"><br/>
                                <input class="form-control" name="PASSWORD" type="password" placeholder="Password"><br/>
                                <input class="form-control btn btn-primary" type="submit" value="Login">
                            </form>
                        </div>
                        <div class="hidden profile_form" id="signup_form">
                            <form action="./controller.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="AUTH_TYPE" value="SIGNUP">
                                    <input class="form-control" name="USERNAME" type="text" placeholder="Username"><br/>
                                    <input class="form-control" name="EMAIL" type="email" placeholder="Email"><br/>
                                    <input class="form-control" name="PASSWORD" type="password" placeholder="Password"><br/>
                                    <input class="form-control" name="PASS_CONF" type="password" placeholder="Confirm Password"><br/>
                                    <input class="form-control btn btn-primary" type="submit" value="Signup">
                                </div>
                            </form>
                        </div>
                        ';
                }
                else{
                    $my_environments = list_environments($_COOKIE['USERNAME_COOK']);
                    echo '
                     <div class="row title_row">
                          <div class="col-sm-12 text-center">
                            <h1>'.$_COOKIE["USERNAME_COOK"].' | Environments </h1>
                            <button class="btn btn-primary"> Create New </button>
                        </div>
                        <hr>
                        '. $my_environments .'
                    </div>

                    '
                    ;
                }
            ?>
        </div>
    </body>
</html>
