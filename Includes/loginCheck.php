<?php
// Initialize the session
session_start();
 
// Check to see if the user is logged in, if not then redirect to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>