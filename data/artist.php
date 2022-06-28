<?php
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");

    $clientpermission = check_permission(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php require("assets/usernavbar.php"); ?>

    <?php
        $selectedartistid = $_GET['artistid'];
        $query = "SELECT * FROM lineup WHERE aid = '$selectedartistid'";
        $stm = $conn->prepare($query);
        if ($stm->execute()) {
            $artist = $stm->fetch(PDO::FETCH_OBJ);
            echo
            "<div class='artist-content-wrapper'>".
                "<div class='artist-content-text'>".
                    "<p>$artist->bio<br><a href='$artist->link' target='_blank'>$artist->link</a></p>".
                "</div>".
                "<div class='artist-content-img-wrapper'>".
                    "<div class='artist-content-img-shadow'></div>".
                    "<div class='artist-content-img' style='background: url($artist->image); background-position: center; background-repeat: no-repeat; background-size: cover;'></div>".
                "</div>".
            "</div>";
        }
    ?>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>