<?php
    require_once("utilfunctions.php");
    require_once("databaselink.php");
    check_permission(true);
    debug_to_console("CLIENT PERMS: ".$_SESSION['permission'], "warn");
?>

<nav class="usernav">
    <a href="/FestivalProject/data/index.php" class="homelink">
        <img src="/FestivalProject/data/media/musiclogo.png"/>
    </a>
    <ul class="usernav-ul">
        <a href="/FestivalProject/data/index.php"><li class="usernav-ul-li"><p>Home</p></li></a>
        <!-- <a href="/FestivalProject/data/news.php"><li class="usernav-ul-li"><p>News</p></li></a> -->
        <a href="/FestivalProject/data/line-up.php"><li class="usernav-ul-li"><p>Line Up</p></li></a>
        <a href="/FestivalProject/data/tickets.php"><li class="usernav-ul-li"><p>Webshop</p></li></a>
        <a href="/FestivalProject/data/contact.php"><li class="usernav-ul-li"><p>Contact</p></li></a>
        <?php
            if (check_permission() == "none") {
                echo "<a href='/FestivalProject/data/login.php'><li class='usernav-ul-li'><p>Login</p></li></a>";
            }
            if (check_permission() == "user" ) {
                if (basename($_SERVER['PHP_SELF']) == "account.php") {
                    echo "<a href='/FestivalProject/data/logout.php'><li class='usernav-ul-li'><p>Logout</p></li></a>";
                } else {
                    echo "<a href='/FestivalProject/data/account.php'><li class='usernav-ul-li'><p>Account</p></li></a>";
                }
            }
            if (check_permission() == "admin") {
                if (basename($_SERVER['PHP_SELF']) == "admin.php") {
                    echo "<a href='/FestivalProject/data/logout.php'><li class='usernav-ul-li'><p>Logout</p></li></a>";
                } else {
                    echo "<a href='/FestivalProject/data/admin.php'><li class='usernav-ul-li'><p>Admin</p></li></a>";
                }
            }
        ?>
    </ul>
</nav>

<style>
.usernav {
    display: flex;
    flex-wrap: wrap;
    position: relative;
    width: 100vw;
    height: 3.5em;
    font-family: var(--oswald);
    overflow: hidden;
    font-size: 1.5em;
    box-shadow: 0 0.1em 20px 10px rgb(87, 71, 90);
    z-index: 1;
}
.usernav a img {
    margin-inline: 25px;
    margin-block: 15px;
    z-index: 3;
    max-width: 75px;
    max-height: 75px;
}
.usernav-ul {
    display: flex;
    position: relative;
    margin: 0;
    padding: 0;
    width: 50%;
    height: 100%;
    flex-direction: row;
    align-items: center;
    z-index: 2;
}
.usernav-ul a li {
    text-decoration: none;
    list-style: none;
    color: var(--white);
    padding: 2em;
    transition: 200ms;
    z-index: 3;
}
.usernav-ul a li p {
    margin: 0;
    padding: 0;
    transition: 150ms;
}
.usernav-ul a {
    text-decoration: none;
    z-index: 3;
}

.usernav-ul a:hover li {
    background-color: rgb(90, 42, 91);
    transition: 150ms;
}
.usernav-ul a:hover li p {
    transform: scale(1.1);
    transition: 150ms;
}
.usernav-ul:hover a > *:not(*:hover) {
    filter: blur(2px);
    transition: 150ms;
}
.homelink {
    position: relative;
    margin: 0;
    padding: 0;
    border: 0 none;
    display: flex;
    height: 100%;
    width: fit-content;
}
</style>