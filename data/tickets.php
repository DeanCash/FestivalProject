<!DOCTYPE html>
<?php
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");
    
    $clientpermission = check_permission(true);
    $clientid = get_client_id();
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
                        "<div>$$ticket->price</div>".
                        "<select name='amountselected' class='color-black'>".
                            "<option class='color-black' value='1'>1</option>".
                            "<option class='color-black' value='2'>2</option>".
                            "<option class='color-black' value='3'>3</option>".
                            "<option class='color-black' value='4'>4</option>".
                            "<option class='color-black' value='5'>5</option>".
                            "<option class='color-black' value='20'>20</option>".
                        "</select>".
                        "<input class='color-black' type='submit' name='buytickets' value='order'>".
                        "<input hidden type='text' name='cardid' value='$ticket->tid'>".
                    "</form>".
                    "<div>$ticket->name</div>".
                    "<div class='ticket-img' style='background: url($ticket->ticketimg); background-position: center; background-repeat: no-repeat; background-size: cover;'></div>".
                "</div>";
            }
        ?>
    </div>

    <?php
        if (isset($_POST['buytickets']) && $clientid != NONE) {
            if ($clientpermission == NONE) {
                return;
            } else {
                $ticketid = $_POST['cardid'];
                $currentdate = date("Y-m-d H:i:s");
                $amountselected = $_POST['amountselected'];
                
                $results = get_all_from_table("tickets", $conn);
                foreach ($results as $ticket) {
                    if ($ticket->tid == $ticketid) {
                        $currentCount = $ticket->amount;
                    }
                }

                $newCount = $currentCount - $amountselected;
                if ($newCount < 0) {
                    return;
                }

                $query = "UPDATE tickets SET amount='$newCount' WHERE tid='$ticketid'";
                $stm = $conn->prepare($query);
                if ($stm->execute()) {}

                
                
                // here
                $purchaseExists = true;
                $results = get_all_from_table("purchases", $conn);
                foreach ($results as $aankoop) {
                    if ($aankoop->customerid == $clientid && $aankoop->ticketid == $ticketid) {
                        $newAmount = $aankoop->amount + $amountselected;

                        $query = "UPDATE purchases SET amount='$newAmount' WHERE customerid='$clientid'";
                        $stm = $conn->prepare($query);
                        if ($stm->execute()) {}
                        $purchaseExists = false;
                        break;
                    } else {
                        $purchaseExists = true;
                    }
                }
                if ($purchaseExists) {
                    $query = "INSERT INTO purchases( customerid, ticketid, date, amount ) VALUES ( :customerid, :ticketid, :date, :selected )";
                    $stm = $conn->prepare($query);
                    $stm->bindParam(":customerid", $clientid);
                    $stm->bindParam(":ticketid", $ticketid);
                    $stm->bindParam(":date", $currentdate);
                    $stm->bindParam(":selected", $amountselected);
                    if ($stm->execute()) {}
                }
            }
        }

    ?>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>