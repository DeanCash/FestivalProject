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
        <form class="contact-content" method="POST">
            <input type="text" placeholder="SampleEmail@outlook.com" name="EmailEmail" required>
            <input type="text" placeholder="(optional) Phone Numer" name="EmailPhone" required>
            <textarea placeholder="Your message here." name="EmailMessage" required></textarea>
            <input type="submit" name="EmailSubmit">
        </form>
    </div>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>