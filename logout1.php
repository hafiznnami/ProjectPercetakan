<?php 
session_start();

session_destroy();
session_unset();
$_SESSION = [];
header("location:login-admin.php");

?>