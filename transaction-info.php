<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('Includes/metadata.php'); ?>

        <title>Resolution Holdings - View Transactions</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <?php require('Includes/loginCheck.php'); ?>
        <?php require('Includes/header.php'); ?>

        <section>
            <div class="centered container">
                <h1>Now viewing transactions for the current account.</h1>
            </div>

            <div class="centered container">
                <?php require("Includes/transactionInfoHandler.php");?>
            </div>
        </section>
    </body>
</html>