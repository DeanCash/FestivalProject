<?php require_once("assets/databaselink.php"); ?>
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

    <div class="top-lineup-content-wrapper">
        <h2 style="font-size: 2em;">Line Up</h2>
        <p>Here you can view all arists and their concerts, and buy tickets to their concerts!</p>
        <div class="lineup-content-wrapper">
            <?php
                $results = get_all_from_table("lineup", $conn);
                foreach ($results as $artist) {
                    echo
                    "<div class='artist-card'>".
                        "<div class='artist-card-img' style='background: url($artist->image); background-position: center; background-repeat: no-repeat; background-size: cover; min-width: 20%; height: 100%;'></div>".
                        "<h3>$artist->artist</h3>".
                        "<p><a href='artist.php?artistid=$artist->aid'>Visit</a></p>".
                    "</div>";
                }
            ?>
        </div>
    </div>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>