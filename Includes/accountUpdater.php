<?php
    // dbConfig include
    require_once 'dbConfig.php';
    
    echo "testing1";
    // Define/Initialize variables
    $linkedMemberID = "";
    $AccountID = "";
    $AccountType = "";
    $AccountStatus = "";
    $AccountCreatedOn = "";
    $AccountBalance = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $linkedMemberID = trim($_POST["linkedMember"]);
        $AccountID = trim($_POST["account-id"]);
        $AccountType = trim($_POST["account-type"]);
        $AccountStatus = trim($_POST["account-status"]);
        $AccountCreatedOn = trim($_POST["creationTime"]);
        $AccountBalance = trim($_POST["account-balance"]);
        echo "testing2";
        
        // Prepare an insert statement
        //$sql = "UPDATE accounts SET (`ACCOUNT_BALANCE`, `ACCOUNT_TYPE`, `CREATED`, `ACCOUNT_STATUS`, `MEMBER_ID`) VALUES (?, ?, ?, ?, ?) WHERE ACCOUNT_ID={$AccountID}";
        $sql = "UPDATE accounts SET ACCOUNT_BALANCE={$AccountBalance}, ACCOUNT_TYPE={$AccountType}, CREATED={$AccountCreatedOn}, ACCOUNT_STATUS={$AccountStatus}, MEMBER_ID={$linkedMemberID} WHERE ACCOUNT_ID={$AccountID}";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters (redundant?)
            mysqli_stmt_bind_param($stmt, "sssss", $AccountBalance, $AccountType, $AccountCreatedOn, $AccountStatus, $linkedMemberID);
            echo "Testing3";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to account page
                header("location: ../accounts-admin.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }

?>