<?php
include("config.php");
?>
<?php
session_start();
?>
<?php if(!isset($_SESSION['user']))
{
  header("location:index.php");
}
else{
    session_destroy();
    header("location:index.php");
}
?>