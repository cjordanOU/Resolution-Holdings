<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the user's accounts and display them
    $sql = "SELECT * FROM accounts WHERE MEMBER_ID={$_SESSION["id"]}";
    $result = $connection-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            //echo "<tr><td>". $row["ACCOUNT_ID"] ."</td><td>&#36;". $row["ACCOUNT_BALACE"] ."</td><td>". $row["ACCOUNT_TYPE"] ."</td></tr>";
            //echo "<section class='account-box'><h2>Member ID: ". $_SESSION["id"] ."</h2>";
            echo "<section class='account-box'><h2>Account ID: ". $row["ACCOUNT_ID"] ."</h2>";
            echo "<div class='account-info'><h4>Account Type: ". ucfirst($row["ACCOUNT_TYPE"]) ."</h4>";
            
            
            if (($row["ACCOUNT_STATUS"]) == 'open') {
                echo "<h4>Account Status: <span class='account-open'>". ucfirst($row["ACCOUNT_STATUS"]) ."</span></h4>";
                echo "<h4>Account Created On: ". $row["CREATED"] ."</h4>";
                echo "</div><div class='account-balance'>";
                echo "<h3>Account Balance: &#36;". number_format($row["ACCOUNT_BALACE"],2) ."</h3>"; // Note: The database uses 'BALACE' not 'BALANCE'
                echo "<form action='transaction-info.php' method='POST'>";
                echo "<input type='hidden' name='transaction_account' value='". $row["ACCOUNT_ID"] ."'>";
                echo "<input type='submit' value='View Transactions' title='View the transactions associated with this account'>";
                echo "</form><br><br>";
                echo "<form action='transaction-create.php' method='POST'>";
                echo "<input type='hidden' name='transaction_account' value='". $row["ACCOUNT_ID"] ."'>";
                echo "<input type='submit' value='Make Transaction' title='Make a new transaction online'>";
                
                if (($_SESSION["employee"]) == true) {
                    echo "<br><p>employee menu goes here</p>";
                }

                echo "</form><br><br>";
            }
            else {
                echo "<h4>Account Status: <span class='account-shut'>". ucfirst($row["ACCOUNT_STATUS"]) ."</span></h4>";
                echo "<h4>Account Created On: ". $row["CREATED"] ."</h4>";
                echo "</div><div class='account-balance'>";
                echo "<h3>Account Balance: &#36;". number_format($row["ACCOUNT_BALACE"],2) ."</h3>"; // Note: The database uses 'BALACE' not 'BALANCE'
                echo "<form action='transaction-info.php' method='POST'>";
                echo "<input type='hidden' name='transaction_account' value='". $row["ACCOUNT_ID"] ."'>";
                echo "<input type='submit' value='View Transactions' title='View the transactions associated with this account'>";
                echo "</form><br>";
                echo "<p>Note: You cannot make new transactions with a closed or frozen account</p>";
                if (($_SESSION["employee"]) == true) {
                    echo "<br><p>employee menu goes here</p>";
                }
            }

            echo "</div></section>";
        }
        
    }
    else {
        echo "<p>No accounts found with this member, would you like to create one?</p>";
    }
?>
