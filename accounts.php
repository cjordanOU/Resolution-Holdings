<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require('Includes/metadata.php'); ?>

        <title>Resolution Holdings - Home</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <?php require('Includes/header.php'); ?>
        <?php require('Includes/loginCheck.php'); ?>

        <section>
            <h1>Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Thank you for choosing Resolution Holdings.</h1>

        </section>
    </body>
</html>