<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script src="./Scripts/navscript.js"></script>
<link rel="stylesheet" href="./css/navigation.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">L.E.B.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul id="nav_options" class="navbar-nav mr-auto">
        <li id="landing_page" class="nav-item">
          <a id="home_link" onclick="nav_post('landing_page')" class="nav-link" href="#">Home</a>
      </li>
      <li id="forum" class="nav-item">
        <a id="forum_link" onclick="nav_post('forum')" class="nav-link" href="#">Forum</a>
      </li>
      <li id="environments" class="nav-item">
        <a id="environments_link" onclick="nav_post('environments')" class="nav-link" href="#">Environments</a>
      </li>
    </ul>
    <ul id="nav_options" class="navbar-nav ml-auto">
      <li id="landing_page" class="nav-item">
        <a id="profile_link" onclick="nav_post('profile')" class="nav-link" href="#">Profile</a>
      </li>
      <li id="forum" class="nav-item">
        <a id="logout_btn" onclick="nav_post('logout')" class="nav-link" href="#">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<form id="navigation_form" method="POST" action="./controller.php">
    <input id="navigation_form_input" type="hidden" name="page" value="">
</form>
