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
                        <a href="logout.php" class="button">
                            <li class="nav-link">
                                LOGGA UT
                            </li>
                        </a>
                        <a href="addCat.php" class="button">
                            <li class="nav-link">
                                NY KATT
                            </li>
                        </a>
                        <?php if ($_SESSION['username'] == 'mukti') { ?>
                            <a href="upload.php" class="button">
                                <li class="nav-link">
                                    NY BILD
                                </li>
                            </a>
                        <?php } ?>


                    <?php } else { ?>

                        <a href="register.php" class="button">
                            <li class="nav-link">
                                NY ANVÄNDARE
                            </li>
                        </a>
                        <a href="login.php" class="button">
                            <li class="nav-link">
                                LOGGA IN
                            </li>
                        </a>

                    <?php } ?>

                    </ul>
            </nav>