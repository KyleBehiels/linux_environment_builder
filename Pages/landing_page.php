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
                <h1>Welcome to Linux Environment Builder!</h1>
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
            <div class="row ">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Web Developer</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="hide_on_mobile" src="https://placehold.it/500x500">
                            </div>
                            <div class="col-sm-10 col-xs-12 text-center">
                                <p>Here is an example script for setting up a linux machine for web development </p>
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
                                <hr>
                                <button class="btn btn-success">Download</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="row ">
                <div class="card card-default">
                    <div class="card-header">
                        <h3>Functional Desktop PC</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="hide_on_mobile" src="https://placehold.it/500x500">
                            </div>
                            <div class="col-sm-10 col-xs-12 text-center">
                                <p>Example environment for someone seeking a free, clean and usable desktop environment.</p>
                                <table class="table">
                                    <tr>
                                        <th>Package</th>
                                        <th class="hide_on_mobile">Function</th>
                                        <th class="hide_on_mobile">Size</th>
                                    </tr>
                                    <tr>
                                        <td>LibreOffice</td>
                                        <td class="hide_on_mobile">Open office suite capable of viewing and editing files in microsoft office formats</td>
                                        <td class="hide_on_mobile">15mb</td>
                                    </tr>
                                    <tr>
                                        <td>Chrome</td>
                                        <td class="hide_on_mobile">Google's web browser</td>
                                        <td class="hide_on_mobile">30mb</td>
                                    </tr>
                                    <tr>
                                        <td>Pinta</td>
                                        <td class="hide_on_mobile">Simple program for drawing or editing images</td>
                                        <td class="hide_on_mobile">3mb</td>
                                    </tr>
                                </table>
                                <hr>
                                <button class="btn btn-success">Download</button>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>