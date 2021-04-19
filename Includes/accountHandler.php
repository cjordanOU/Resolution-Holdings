<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the user's accounts and display them
    $sql = 'SELECT * FROM accounts WHERE MEMBER_ID=2';
    $result = $connection-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            //echo "<tr><td>". $row["ACCOUNT_ID"] ."</td><td>&#36;". $row["ACCOUNT_BALACE"] ."</td><td>". $row["ACCOUNT_TYPE"] ."</td></tr>";
            echo "<section class='account-box'><h2>Account ID: ". $row["ACCOUNT_ID"] ."</h2>";
            echo "<div class='account-info'><h4>Account Type: ". ucfirst($row["ACCOUNT_TYPE"]) ."</h4>";
            echo "<h4>Account Status: ". ucfirst($row["ACCOUNT_STATUS"]) ."</h4>";
            echo "<h4>Account Created On: ". $row["CREATED"] ."</h4>";
            echo "</div><div class='account-balance'>";
            echo "<h3>Account Balance: &#36;". number_format($row["ACCOUNT_BALACE"],2) ."</h3>"; // Note: The database uses 'BALACE' not 'BALANCE'
            echo "<a>View Transactions</a><br><a>Make Transaction</a>";
            echo "</div></section>";
        }
        
    }
    else {
        echo "<p>No accounts found with this member, would you like to create one?</p>";
    }
?>