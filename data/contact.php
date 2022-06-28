<!DOCTYPE html>
<?php    
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");
    
    check_permission(true);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php require("assets/usernavbar.php"); ?>

    <div class="contact-top-div">
        <h2>Contact</h2>
        <form method="post" class="contact-form">
            <input type="text" name="email" placeholder="Example@Email.com" class="contact-email" required>
            <input type="text" name="number" placeholder="(optional) Phone Number" class="contact-phone">
            <textarea type="text" name="message" placeholder="Message" class="contact-textarea" required></textarea>
            <input type="submit" name="EmailSubmit" value="send" class="contact-submit" required>
        </form>
    </div>
    <?php
        if(isset($_POST['EmailSubmit'])) {
            $email = $_POST['email'];
            $number = $_POST['number'];
            $message = $_POST['message'];
        }
    ?>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>