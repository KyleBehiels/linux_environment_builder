<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * NOTE: All paths are relative to the controller
 *
 */

?>
<html>
    <head>
        <title>
            Linux Environment Builder
        </title>
        <?php include('./Components/header.php') ?>
        <link rel="stylesheet" href="./css/landing.css">
        <script src="./Scripts/landing.js"></script>
    </head>
    <body>

        <div class="container">
            <?php include("./Components/navigation.php") ?>
            <div class="jumbotron text-center">
                <h1>Welcome to Linux Environment Builder<?php echo isset($_COOKIE['USERNAME_COOK']) ? " ".$_COOKIE['USERNAME_COOK'] : "" ?>!</h1>
                <p>Linux environment builder is a web application similar to <a href="https://ninite.com">Ninite for windows</a> that allows users to select a list of applications from a GUI and download a single install script for all of them.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>

            <hr>

            <div class="row">
                <div class="col-6 text-center border-right highlighted-div split">
                    <h3 class="">Pick your own</h3>
                    <p>
                        Pick your own set of programs from our list and generate a custom script perfectly suited to your needs! Our list contains tools for graphics, development and more.
                    </p>
                    <button class="btn btn-primary">Get started!</button>
                </div>
                <div class="col-6 text-center split">
                    <h3 class="">Pre-defined Lists</h3>
                    <p>
                        We have pre defined scripts for everyone from web developers to graphic artists to people just looking for a functional desktop environment.
                    </p>
                    <button class="btn btn-primary">Take a look!</button>
                </div>
            </div>
            <hr>
            <h2 class="text-center">Examples</h2>
            <hr>
            <?php echo list_environments('admin'); ?>
        </div>
    </body>
</html>
