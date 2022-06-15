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
        <p>Here you can view all arists and their concerts, and buy tickets to them</p>
        <div class="lineup-content-wrapper">
            <?php
                // $query = "SELECT * FROM aaa";
                // $stm = $conn->prepare($query);
                // if ($stm->execute()) {
                    // $results = $stm->fetchAll(PDO::FETCH_OBJ);
                    // foreach ($result as $artist) {

                    // }
                // }
            ?>
            <div class="artist-card">text</div>
            <div class="artist-card">text</div>
            <div class="artist-card">text</div>
            <div class="artist-card">text</div>
            <div class="artist-card">text</div>
        </div>
    </div>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>