<!DOCTYPE html>
<?php
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");
    use queries\selectq;
    
    $clientpermission = check_permission(true);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php require("assets/usernavbar.php"); ?>

    <h2 class="tickets-title">Available Tickets</h2>
    <div class="tickets-wrapper">
        <?php
            $results = get_all_from_table("tickets", $conn);
            // echo "<pre>".print_r($results)."</pre>";
            foreach ($results as $ticket) {
                echo
                "<div class='ticket'>".
                    "<form method='POST'>".
                        "<div>$ticket->price</div>".
                        "<select>".
                            "<option value='1'>1</option>".
                            "<option value='2'>2</option>".
                            "<option value='3'>3</option>".
                            "<option value='4'>4</option>".
                            "<option value='5'>5</option>".
                        "</select>".
                    "</form>".
                    "<div>$ticket->name</div>".
                    "<div class='ticket-img' style='background: url($ticket->ticketimg); background-position: center; background-repeat: no-repeat; background-size: cover;'></div>".
                "</div>";
            }
        ?>
    </div>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>