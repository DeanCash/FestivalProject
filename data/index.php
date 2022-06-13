<?php require("assets/databaselink.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
    <title>Home - Festival</title>
</head>
<body class="body-index">
    <?php require("assets/usernavbar.php"); ?>

    <div class="top-content-wrapper">
        <div class="top-content-subclass">
            <div id="top-content-first-text">Welcome to Amerijck's website! Here you can buy tickets to any of our upcoming EDM events.</div>
            <div id="top-content-first-image-div">
                <div id="top-content-first-image">
                    <img src="media/festivalimg1.png">
                </div>
            </div>
        </div>
        <div class="top-content-subclass">
            <div id="top-content-first-image-div2">
                <div id="top-content-first-image2">
                    <img src="media/festivalimg2.png">
                </div>
            </div>
            <div id="top-content-first-text">A specific artist you are looking for? You can find them and their concerts in the Line-Up page!</div>
        </div>
        <div class="top-content-subclass">
            <div id="top-content-first-text">If you need to get in contact with us, you can find all the details in the contact page.</div>
            <div id="top-content-first-image-div">
                <div id="top-content-first-image">
                    <img src="media/festivalimg3.png">
                </div>
            </div>
        </div>
    </div>
    
    <hr class="page-content-split">

    <div class="newsitems-top-wrapper">
        <h2>News Items</h2>
        <div class="newsitems-wrapper">
            <?php
                $query = "SELECT * FROM newsitems ORDER BY niid desc";
                $stm = $conn->prepare($query);
                if ($stm->execute()) {
                    $results = $stm->fetchAll(PDO::FETCH_OBJ);
                    if (!empty($results)) {
                        foreach ($results as $item) {
                            echo
                            "<div class='news-item'>".
                                "<div style='background: url($item->urllink); background-position: center; background-repeat: no-repeat; background-size: cover; min-width: 20%; height: 100%;'></div>".
                                "<p>$item->content</p>".
                            "</div>";
                        }
                    } else {
                        echo "No recent news!";
                    }
                }
            ?>
        </div>
    </div>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>