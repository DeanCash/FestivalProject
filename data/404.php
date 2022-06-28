<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="resources/error.png">
    <title>Error!</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Exo+2&display=swap');

        #wrapper {
            position: absolute;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
            height: 20em;
            width: 32em;
        }
        #title {
            position: relative;
            font-family: "Bebas Neue";
            font-size: 5em;
            position: absolute;
            left: 50%;
            top: 30%;
            min-width: fit-content;
            min-height: fit-content;
            transform: translate(-50%, -50%);
        }
        #content {
            position: relative;
            font-size: 1.2em;
            font-weight: 600;
            font-family: "Exo 2";
            position: absolute;
            left: 50%;
            top: 65%;
            min-width: fit-content;
            min-height: fit-content;
            line-height: 1.5em;
            text-align: center;
            transform: translate(-50%, -50%);
            padding: 0.5em;
            border-bottom: 0.2em #333 solid;
            border-left: 0.2em #333 solid;
        }
        #content p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="title">Error 404</div>
        <div id="content">
            <p>This Page Doesn't Exist!<br><a href="./index.php">Go Home</a></p>
        </div>
        <?php
            require_once("assets/databaselink.php");
        
            session_unset();

            session_destroy();
        ?>
    </div>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>