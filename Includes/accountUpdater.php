<?php
    // dbConfig include
    require_once 'dbConfig.php';
    // Define/Initialize variables
    $linkedMemberID = "";
    $AccountID = "";
    $AccountType = "";
    $AccountStatus = "";
    $AccountCreatedOn = "";
    $AccountBalance = "";
    $DeleteAccount = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $linkedMemberID = trim($_POST["linkedMember"]);
        $AccountID = trim($_POST["account-id"]);
        $AccountType = trim($_POST["account-type"]);
        $AccountStatus = trim($_POST["account-status"]);
        $AccountCreatedOn = trim($_POST["creationTime"]);
        $AccountBalance = trim($_POST["account-balance"]);
        $DeleteAccount = trim($_POST["account-delete"]);
        
        // Prepare an insert statement
        //$sql = "UPDATE accounts SET (`ACCOUNT_BALANCE`, `ACCOUNT_TYPE`, `CREATED`, `ACCOUNT_STATUS`, `MEMBER_ID`) VALUES (?, ?, ?, ?, ?) WHERE ACCOUNT_ID={$AccountID}";
        $sql = "UPDATE accounts SET `ACCOUNT_BALACE`=?, `ACCOUNT_TYPE`=?, `CREATED`=?, `ACCOUNT_STATUS`=?, `MEMBER_ID`=? WHERE `ACCOUNT_ID`=?";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters (redundant?)
            mysqli_stmt_bind_param($stmt, "ssssss", $AccountBalance, $AccountType, $AccountCreatedOn, $AccountStatus, $linkedMemberID, $AccountID);
            echo "Testing3";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                if($DeleteAccount == "yes"){
                    $delSQL = "DELETE FROM accounts WHERE ACCOUNT_ID={$AccountID}";
                    if(mysqli_query($connection, $delSQL)){
                        // Redirect to account admin page
                        header("location: ../accounts-admin.php");
                    }
                }

                // Redirect to account admin page
                header("location: ../accounts-admin.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Something went wrong, please try again later.";
        }

    }

?>