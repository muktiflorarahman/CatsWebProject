<?php
include("auth_session.php");

if ($_SERVER["QUERY_STRING"] == "noname") {
    session_unset();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kattadoption</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Your page's content goes here, including header, nav, aside, everything -->
    <div class="page-content">

        <!-- This is all but footer -->
        <div id="content-wrap">

            <nav class="topnav">
                <a href="index.php" class="brand-text">Kattadoption</a>

                <?php if (isset($_SESSION["userid"])) { ?>
                    <div class="user">
                        <?php echo $_SESSION["username"]; ?>
                    </div>
                    <ul>
                        <li class="nav-link">
                            <a href="addCat.php" class="button">Ny katt</a>
                        </li>
                        <li class="nav-link">
                            <a href="logout.php" class="button">LOGGA UT</a>
                        </li>

                    <?php } else { ?>

                        <li class="nav-link">
                            <a href="register.php" class="button">NY ANVÄNDARE</a>
                        </li>
                        <li class="nav-link">
                            <a href="login.php" class="button">LOGGA IN</a>
                        </li>

                    <?php } ?>

                    </ul>
            </nav>