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
                <input required type="text" placeholder="YourEmail@example.com | Username">
                <input required type="text" placeholder="Password">
                <input type="submit" value="login">
            </form>
        </div>
        <div class="login-half">
            <h2>Register</h2>
            <form class="login-form" method="POST">
                <input required type="text" placeholder="Username">
                <input required type="text" placeholder="YourEmail@example.com">
                <input required type="text" placeholder="Password">
                <input type="submit" value="register">
            </form>
        </div>
    </div>
</body>
</html>