<?php
// dbConfig include
require_once 'Includes/dbConfig.php';

// Start the user session
session_start();

// Check to see if user is already logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: accounts.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT MEMBER_ID, USERNAME, PASSWORD FROM members WHERE USERNAME = ?";

        if($stmt = mysqli_prepare($connection, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);


                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Employee Check
                            $empCheck = "SELECT * FROM employees WHERE MEMBER_ID=$id and WHEN_TERMINATED IS NULL";
                            $checkEmployee = $connection-> query($empCheck);

                            $loginAttemptStatement = "INSERT INTO login_attempts (`TIME`, `SUCCESS`, `MEMBER_ID`) VALUES(NOW(), 1 ,$id)";
                            if($stmt = mysqli_prepare($connection, $loginAttemptStatement)) {
                                mysqli_stmt_execute($stmt);
                            }

                            if ($checkEmployee-> num_rows > 0) {
                                $_SESSION["employee"] = true;
                                // Redirect user to accounts page
                                header("location: accounts.php");
                            }
                            else {
                                $_SESSION["employee"] = false;
                                // Redirect user to accounts page
                                header("location: accounts.php");
                            }

                        } else{

                            $loginAttemptStatement = "INSERT INTO login_attempts (`TIME`, `SUCCESS`, `MEMBER_ID`) VALUES(NOW(), 0 ,$id)";
                            if($stmt = mysqli_prepare($connection, $loginAttemptStatement)) {
                                mysqli_stmt_execute($stmt);
                            }

                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";

                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($connection);
}
?>
