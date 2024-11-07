<?php
session_start(); // start the session
if (!isset($_SESSION['user'])) { // if the value of user is not set in the session, means user is not logged in
    header("Location: login.php"); // not logged in user should be logged in, redirect to login page
}
require "db.php"; // load the database file
$db = new DbHandler(); // object of DbHandler class
$db->deletePost($_GET['id']); // delete the post from the database, calling method to delete the post
header("Location: index.php"); // redirect to index page
?>