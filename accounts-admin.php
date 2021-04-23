<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('Includes/metadata.php'); ?>

        <title>Resolution Holdings - Accounts</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <?php require('Includes/loginCheckAdmin.php'); ?>
        <?php require('Includes/header.php'); ?>

        <section>
            <div class="centered container">
                <h1>Accounts Admin View - <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
            </div>

            <div class="centered container">
            <?php require("Includes/accountHandlerAdmin.php");?>
            </div>
        </section>
    </body>
</html>