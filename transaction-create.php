<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('Includes/metadata.php'); ?>

        <title>Resolution Holdings - New Transaction</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <?php require('Includes/loginCheck.php'); ?>
        <?php require('Includes/header.php'); ?>

        <section>
            <div class="container login-area">
                <h1>New Transaction</h1>
                <p>Account-ID: <?php echo $_POST["transaction_account"];?></p>

                <?php require('Includes/transactionCreationHandler.php'); ?>
                <!-- Form is protected from SQL injection by using htmlspecialchars -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-section">
                        <label>Transaction Amount:</label>
                        <input type="text" name="transactionAmount" size="40" title="Enter your first name" required>
                    </div>

                    <div class="form-section">
                        <label>Transaction Type:</label>
                        <select name="transactionType" title="Select your applicable gender" required>
                            <option value="withdraw">Withdraw</option>
                            <option value="deposit">Deposit</option>
                            <option value="fee">Fee</option>
                        </select>
                    </div>

                    <div class="form-section">
                        <label>Transaction Description:</label>
                        <input type="text" name="transactionDescription" size="40" title="Enter your first name" required>
                    </div>

                    <div class="form-section">
                        <input type="submit" class="fancyButton-1" value="Submit">
                        <input type="reset" class="fancyButton-2" value="Reset">
                    </div>
                </form>
                
            </div>

        </section>

    </body>
</html>
