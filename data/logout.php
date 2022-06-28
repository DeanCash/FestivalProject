<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="media/favicon.png">
    <title>Signing Out...</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    
    :root {
        --body-bg-color: linear-gradient(90deg, rgb(33, 35, 40) 50%, rgb(28, 31, 36) 65%);
        --pink: rgb(238, 80, 255);
    }

    body {
        background: var(--body-bg-color);
        color: var(--pink);
    }

    .logoutmsg {
        position: absolute;
        left: 50%;
        top: 40%;
        transform: translate(-50%, -50%);
        border: solid 0.2em var(--pink);
        border-radius: 2em;
        text-align: center;
        padding: 2em;
    }
    .logoutmsg h3 {
        font-family: "Roboto";
        font-weight: 600;
        font-size: 2em;
    }
    .logoutmsg p {
        font-family: "Roboto";
        font-weight: 500;
        font-size: 1.5em;
    }
</style>

<script src="scripts/indexscript.js" defer></script>

<?php
    require_once("assets/databaselink.php");

    session_unset();
    
    session_destroy();
    
    echo
    "<div class='logoutmsg'>".
        "<h3>Successfully Signed Out</h3>".
        "<p>Redirecting...</p>".
    "</div>";

    header("refresh:1;url=index.php");
    exit();
?>