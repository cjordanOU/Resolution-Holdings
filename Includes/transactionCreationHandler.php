<?php
    // dbConfig include
    require_once 'dbConfig.php';

    echo "Testing";
    // Define/Initialize variables
    $trnAccount = $_POST["transaction_account"];
    $trnAmount = "";
    $trnType = "";
    $trnDesc = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $trnAmount = trim($_POST["transactionAmount"]);
        $trnType = trim($_POST["transactionType"]);
        $trnDesc = trim($_POST["transactionDescription"]);

        // Prepare an insert statement
        $sql = "INSERT INTO transactions (`AMOUNT`, `TYPE`, `DESCRIPTION`, `ACCOUNT_ID`, `PERFORMED`) VALUES (?, ?, ?, ?, NOW())";

        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $trnAmount, $trnType, $trnDesc, $trnAccount);
            echo "Testing3";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to account page
                header("location: ../accounts.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
?>
