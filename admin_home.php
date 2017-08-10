<?php
include_once 'header.php';
session_start();
if(!(isset($_SESSION['username']))){
  header('Location:index.php');
}
?>
<nav class="teal lighten-3">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo center">Feedback Admin Panel</a>
    <ul id="nav-mobile" class="left hide-on-med-and-down">
    </ul>
  </div>
</nav>
<div class="container" style="margin-top:100px;">
  <div class="row">
    <div class="col s4 offset-s4">
      <a href="theory_bargraph.php" class="waves-effect waves-light btn red">
        Theory Response Report
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col s4 offset-s4">
      <a href="practical_bargraph.php" class="waves-effect waves-light btn blue">
        Practical Response Report
      </a>
    </div>
  </div>

</div>
