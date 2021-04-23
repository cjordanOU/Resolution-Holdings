<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the accounts and display them
    $sql = "SELECT * FROM accounts";
    $result = $connection-> query($sql);

    echo "<a href='accounts.php' title='View normal accounts page' class='fancyButton-1'>Return to Normal View</a>";


    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<section class='account-box'><h2>Account ID: ". $row["ACCOUNT_ID"] ." (Member ID: ". $row["MEMBER_ID"]. ")</h2>";

            // Form
            echo "<div class='account-info'<form action='DEBUG' method='post'>";
            
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
            echo "<br><label>Account Balance: </label><input type='text' name='linkedMember' value='". $row["ACCOUNT_BALACE"] ."'>"; // Note: The database uses 'BALACE' not 'BALANCE'

            echo "</div><div class='account-balance'>";
            echo "<input type='submit' class='fancyButton-1'>";
            echo "</div></form></section>";
        }
    }
?>