<?php
// Initialize the session
session_start();
 
// Check to see if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
}
?>