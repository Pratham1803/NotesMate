<?php
session_start(); // start the session
if (!isset($_SESSION['user'])) { // If not set, redirect to login page 
    header("Location: login.php"); // redirect to login page
    exit(); // EXIT_
}
session_destroy(); // destroy the session
header('Location:login.php');  // redirect to login page
?>