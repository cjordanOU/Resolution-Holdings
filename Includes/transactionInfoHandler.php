<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the user's accounts and display them
    $sql = "SELECT * FROM transactions WHERE ACCOUNT_ID=2"; // Hardcoded Debug
    //$sql = "SELECT * FROM transactions WHERE ACCOUNT_ID={$_POST["transaction_account"]}";
    $result = $connection-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<section class='account-box'><h2>Transaction ID: ". $row["TRANSACTION_ID"] ."</h2>";
            echo "<div class='account-info'><h4>Time of Transaction: ". $row["PERFORMED"] ."</h4>";
            echo "<h4>Type of Transaction: ". ucfirst($row["TYPE"]) ."</h4>";
            echo "<h4>Account ID: ". $row["ACCOUNT_ID"] ."</h4>";
            echo "</div><div class='account-balance'>";
            echo "<h4>Amount: &#36;". $row["AMOUNT"] ."</h4>";
            echo "<h4>New Balance: &#36;". $row["NEW_BALANCE"] ."</h4>";
            echo "<a class='transaction-button' href='accounts.php' title='Return to the account view screen'>Return To Accounts</a><br>";
            echo "</div></section>";
        }
        
    }
    else {
        echo "<p>No transactions found with this member, would you like to make one now?</p>";
    }
?>