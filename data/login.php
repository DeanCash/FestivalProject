<!DOCTYPE html>
<?php
    require_once("assets/databaselink.php");
    require_once("assets/utilfunctions.php");
    use queries\selectq;

    check_permission(true);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Festival</title>
    <link rel="stylesheet" href="styling/indexstyle.css">
    <link rel="icon" href="media/musiclogo.ico">
</head>
<body>
    <?php require("assets/usernavbar.php"); ?>
    <div class="login-top-wrapper">
        <div class="login-half">
            <h2>Login</h2>
            <form class="login-form" method="POST">
                <input required type="text" name="EmailLogin" placeholder="YourEmail@example.com">
                <input required type="password" name="PasswordLogin" placeholder="Password">
                <input type="submit" name="SubmitLogin" value="login">
            </form>
        </div>
        <div class="login-half">
            <h2>Register</h2>
            <form class="login-form" method="POST">
                <input required type="text" name="EmailRegister" placeholder="YourEmail@example.com">
                <input required type="password" name="PasswordRegister" placeholder="Password">
                <input type="submit" name="SubmitRegister" value="register">
            </form>
        </div>
    </div>

    <?php
        if ( isset($_POST['SubmitLogin']) || isset($_POST['SubmitRegister']) ) {
            $results = get_all_from_table("accounts", $conn);

            if (isset($_POST['SubmitLogin'])) {
                $login = $_POST['EmailLogin'];
                $password = $_POST['PasswordLogin'];
                foreach ($results as $account) {
                    if ( ($login == $account->email) && (password_verify($password, $account->password)) ) {
                        $current_permission = check_permission(true);
                        $accountid = $account->uid;
                        if ($current_permission == NONE && $account->isadmin == 1) {
                            $_SESSION['permission'] = ADMIN;
                            $_SESSION['accountid'] = "$accountid";
                        } else {
                            $_SESSION['permission'] = USER;
                            $_SESSION['accountid'] = "$accountid";
                        }
                        header("location:index.php");
                    }
                }
            }
            if (isset($_POST['SubmitRegister'])) {
                $email = $_POST['EmailRegister'];
                $password = $_POST['PasswordRegister'];
                $hashed_password = password_hash($password, null);

                $query = "INSERT INTO accounts( email, password ) VALUES 
                ( '$email','$hashed_password')";
                
                $stm = $conn->prepare($query);
                if ($stm->execute()) {
                    $current_permission = check_permission(true);
                    if ( !($current_permission == USER || $current_permission == ADMIN) ) {
                        $query = "SELECT MAX(uid) AS amount FROM accounts";
                        $stm = $conn->prepare($query);
                        if ($stm->execute()) {
                            $result = $stm->fetch(PDO::FETCH_OBJ);
                        }

                        $_SESSION['permission'] = USER;
                        $_SESSION['accountid'] = "$result->amount";
                        header("location:index.php");
                    }
                }
            }
        }
    ?>

<script src="scripts/indexscript.js" defer></script>
</body>
</html>