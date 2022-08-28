<?php 
session_start();
session_unset($_SESSION['userlogin']);
 session_destroy();
header('location:index.php');
?>