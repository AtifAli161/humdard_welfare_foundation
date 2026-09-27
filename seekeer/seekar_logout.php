<?php 

session_start();

unset($_SESSION['seeker_id']);
unset($_SESSION['seeker_name']);
unset($_SESSION['seeker_email']);

header('location:Seeker_login.php');
die();

?>