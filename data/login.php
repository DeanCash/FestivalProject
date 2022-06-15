<?php require_once("assets/databaselink.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php require("assets/usernavbar.php"); ?>
    <div class="login-top-wrapper">
        <div class="login-half">
            <h2>Login</h2>
            <form class="login-form" method="POST">
                <input required type="text" name="EmailOrUsernameLogin" placeholder="YourEmail@example.com | Username">
                <input required type="password" name="PasswordLogin" placeholder="Password">
                <input type="submit" name="SubmitLogin" value="login">
            </form>
        </div>
        <div class="login-half">
            <h2>Register</h2>
            <form class="login-form" method="POST">
                <input required type="text" name="UsernameRegister" placeholder="Username">
                <input required type="text" name="EmailRegister" placeholder="YourEmail@example.com">
                <input required type="password" name="PasswordRegister" placeholder="Password">
                <input type="submit" name="SubmitRegister" value="register">
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['SubmitLogin'])) {
            $login = $_POST['EmailOrUsernameLogin'];
            $password = $_POST['PasswordLogin'];
            debug_to_console("$login - $password", "log");
        }
        if (isset($_POST['SubmitRegister'])) {
            $username = $_POST['UsernameRegister'];
            $email = $_POST['EmailRegister'];
            $password = $_POST['PasswordRegister'];
            debug_to_console("$username - $email - $password", "log");
        }
    ?>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>