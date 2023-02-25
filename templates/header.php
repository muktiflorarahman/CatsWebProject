<?php
include("auth_session.php");

if ($_SERVER["QUERY_STRING"] == "noname") {
    session_unset();
}
?>


<!DOCTYPE html>
<html lang="sv">

<head>
    <title>Kattadoption</title>
    <script src="https://kit.fontawesome.com/cb9d280861.js" crossorigin="anonymous"></script>
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
                        <?php if ($_SESSION['username'] == 'mukti') { ?>
                            <li>
                                <a href="upload.php" class="nav-link">
                                    NY BILD
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="addCat.php" class="nav-link">
                                NY KATT
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="nav-link">
                                LOGGA UT
                            </a>
                        </li>


                    <?php } else { ?>

                        <li>
                            <a href="register.php" class="nav-link">
                                NY ANVÄNDARE
                            </a>
                        </li>
                        <li>
                            <a href="login.php" class="nav-link">
                                LOGGA IN
                            </a>
                        </li>

                    <?php } ?>

                    </ul>
            </nav>