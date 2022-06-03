<!DOCTYPE html>
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

    <div id="contact-top-div">
        <h2>Contact</h2>
        <form method="post" class="contact-form">
            <input type="text" name="email" placeholder="Example@Email.com" required>
            <textarea type="text" name="message" placeholder="Message" required></textarea>
            <input type="submit" name="EmailSubmit" value="send" id="EmailSubmit" required>
        </form>
    </div>
    <?php
        if(isset($_POST['EmailSubmit'])) {
            $email = $_POST['email'];
            $message = $_POST['message'];
        }
    ?>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>