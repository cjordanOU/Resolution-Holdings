<?php
    // dbConfig include
    require_once 'Includes/dbConfig.php';

    // Select all of the accounts and display them
    $sql = "SELECT * FROM accounts";
    $result = $connection-> query($sql);

    echo "<a href='accounts.php' title='View normal accounts page' class='fancyButton-1'>Return to Normal View</a>";


    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<section class='account-box'><h2>Account ID: ". $row["ACCOUNT_ID"] ."</h2>";
            echo "<h3>Linked Member ID: ". $row["MEMBER_ID"] . "</h3>";
            echo "<div class='account-info'><h4>Account Type: ". ucfirst($row["ACCOUNT_TYPE"]) ."</h4>";
            echo "<h4>Account Status: <span class='account-open'>". ucfirst($row["ACCOUNT_STATUS"]) ."</span></h4>";
            echo "<h4>Account Created On: ". $row["CREATED"] ."</h4>";
            echo "</div><div class='account-balance'>";
            echo "<h3>Account Balance: &#36;". number_format($row["ACCOUNT_BALACE"],2) ."</h3>"; // Note: The database uses 'BALACE' not 'BALANCE'
            echo "</div></section>";
        }
    }
?>