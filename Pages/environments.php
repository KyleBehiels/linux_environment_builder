<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<html>
    <head>
        <title>Environments</title>
        <?php include('./Components/header.php') ?>
        <link rel="stylesheet" href="./css/landing.css">
        <script src="./Scripts/landing.js"></script>
    </head>
    <body>
        <div class="container">
            <?php include('./Components/navigation.php')?>
            <div class="text-center">
                <h1>Pre-Built Environments <br> <small class="text-muted">Browse environments made by other users</small></h1>
                <hr>
                <?php echo list_environments('ALL') ?>
            </div>
            <hr>
        </div>
    </body>
</html>
