<?php 
ob_start();
session_start(); 
include 'connection.php';


unset($_SESSION['is_login']);
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['blog_id']);


 header('location:home.php');

?>