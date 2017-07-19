<?php
session_start();
if(isset($_SESSION['ses_name'])){
  session_destroy();
  header('Location:index.php');
}
 ?>
