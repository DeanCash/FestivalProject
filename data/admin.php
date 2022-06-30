<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account (Admin) - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php

use queries\selectq;

 require("assets/usernavbar.php"); ?>

    <div class="admin-wrapper">
        <div class="admin-box">
            <h2>Accounts</h2>
            <?php
                $results = get_all_from_table("accounts", $conn);
                foreach ($results as $account) {
                    if ($account->isadmin) { $permission = "Admin"; }
                    else { $permission = "User"; }
                    echo "<p>$account->email - $permission</p>";
                }
            ?>
        </div>
        <div class="admin-box">
            <h2>Tickets</h2>
            <?php
                $completeTotal = 0;
                $purchases = get_all_from_table("purchases", $conn);
                $tickets = get_all_from_table("tickets", $conn);
                foreach ($tickets as $ticket) {
                    $total = 0;
                    $amountPurchases = 0;
                    foreach ($purchases as $purchase) {
                        if ($ticket->tid == $purchase->ticketid) {
                            $total += ($purchase->amount * $ticket->price);
                            $amountPurchases += $purchase->amount;
                        }
                    }
                    $completeTotal += $total;
                    echo "<p>$amountPurchases x $ticket->name: $$total</p>";
                }
                echo "<h3>Total: $$completeTotal</h3>";
            ?>
        </div>
    </div>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>