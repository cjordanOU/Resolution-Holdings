<?php
// Initialize the session
session_start();
 
// Check to see if the user is an admin, if not then redirect to the account page
if(!isset($_SESSION["employee"]) || $_SESSION["employee"] !== true){
    header("location: login.php");
    exit;
}
?>