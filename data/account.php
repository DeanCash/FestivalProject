<!DOCTYPE html>
<?php
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");
    use queries\selectq;

    check_permission(true);
    $clientaccountid = get_client_id(true);
?>
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
    <?php
        require("assets/usernavbar.php");

        $query = "SELECT * FROM accounts WHERE uid='$clientaccountid'";
        $stm = $conn->prepare($query);
        debug_to_console("$clientaccountid", WARN);
        if ($stm->execute()) {
            $account = $stm->fetch(PDO::FETCH_OBJ);
        }
    ?>

    <div class="account-content-wrapper">
        <div class="account-content">
            <div class="account-info">
                <h2>Your Account:</h2>
                <p><?php echo "$account->email"; ?></p>
            </div>
            <div class="account-settings">
                <form method="POST">
                    <h2>Reset Password</h2>
                    <input type='password' name="newpassword1" placeholder='new password' required>
                    <input type='password' name="newpassword2" placeholder='confirm new password' required>
                    <input type='submit' name='resetpasswordbtn' value='change'>
                </form>
                <div class="passwords no-match-error">Passwords don't match!</div>
                <div class="passwords successfully-changed">Changed password!</div>
            </div>
        </div>
        <div class="account-winkelwagen-wrapper">
            <h2>Winkelwagen</h2>
            <div class="account-winkelwagen">
                <?php
                    // TODO
                    // tickets echo'en in account winkelwagen
                ?>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST['resetpasswordbtn'])) {
            $password1 = $_POST['newpassword1'];
            $password2 = $_POST['newpassword2'];
            
            if ($password1 != $password2) {
                echo "<style>.no-match-error { display: block; }</style>";
            } else {
                echo "<style>.successfully-changed { display: block; }</style>";
                $newHashedPassword = password_hash("$password1", null);
                $query = "UPDATE accounts SET password='$newHashedPassword' WHERE uid='$clientaccountid'";
                $stm = $conn->prepare($query);
                $stm->execute();
            }
        }
    ?>
<script src="scripts/indexscript.js" defer></script>
</body>
</html>