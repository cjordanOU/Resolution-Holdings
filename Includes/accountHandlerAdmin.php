<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the accounts and display them
    $sql = "SELECT * FROM accounts";
    $result = $connection-> query($sql);

    echo "<a href='accounts.php' title='View normal accounts page' class='fancyButton-1'>Return to Normal View</a>";


    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<section class='account-box2'><h2>Account ID: ". $row["ACCOUNT_ID"] ." (Member ID: ". $row["MEMBER_ID"]. ")</h2>";

            // Form
            echo "<form action='Includes/accountUpdater.php' method='post'>";
            echo "<input type='hidden' name='account-id' value='". $row["ACCOUNT_ID"] . "'>";
            echo "<div class='account-info'>";
            
            // Linked member logic
            echo "<label>Linked Member ID: </label><input type='text' name='linkedMember' value='". $row["MEMBER_ID"] ."'>";

            // Account type logic
            echo "<br><label for='acType'>Account Type: </label>";
            echo "<select name='account-type'><option value='". $row["ACCOUNT_TYPE"] . "'>". $row["ACCOUNT_TYPE"] . "</option>";
            if ($row["ACCOUNT_TYPE"] == 'saving') {
                echo "<option value='checking'>checking</option></select>";
            }
            else {
                echo "<option value='saving'>saving</option></select>";
            }

            // Account status logic
            echo "<br><label for='acStatus'>Account Status: </label>";
            echo "<select name='account-status'><option value='". $row["ACCOUNT_STATUS"] . "'>". $row["ACCOUNT_STATUS"] . "</option>";
            if ($row["ACCOUNT_STATUS"] == 'open') {
                echo "<option value='closed'>closed</option><option value='frozen'>frozen</option></select>";
            }
            if ($row["ACCOUNT_STATUS"] == 'closed') {
                echo "<option value='open'>open</option><option value='frozen'>frozen</option></select>";
            }
            if ($row["ACCOUNT_STATUS"] == 'frozen') {
                echo "<option value='open'>open</option><option value='closed'>closed</option></select>";
            }

            // Account created on logic
            echo "<br><label>Account Created On: </label><input type='text' name='creationTime' value='". $row["CREATED"] ."'>";

            // Account balance logic
            echo "<br><label>Account Balance: </label><input type='text' name='account-balance' value='". $row["ACCOUNT_BALACE"] ."'>"; // Note: The database uses 'BALACE' not 'BALANCE'

            // Account Deleete Logic
            echo "<br><label for='account-delete'>Delete Account?: </label>";
            echo "<select name='account-delete'><option value='no'>no</option><option value='yes'>yes</option></select>";

            echo "</div><div class='account-balance'>";
            echo "<br><input type='submit' class='fancyButton-1'>";
            echo "</div></form><br><br>";

            // Transaction Viewer logic
            echo "<form action='transaction-info.php' method='POST' class='viewAccountButton'>";
            echo "<input type='hidden' name='transaction_account' value='". $row["ACCOUNT_ID"] ."'>";
            echo "<input type='submit' value='View Account Transactions' title='View the transactions associated with this account'>";
            echo "</form>";
            echo "</section>";
        }
    }
?>