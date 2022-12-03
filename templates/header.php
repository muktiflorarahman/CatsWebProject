<?php
session_start();

if ($_SERVER["QUERY_STRING"] == "noname") {
    session_unset();
}
$_SESSION["userid"] = 23;
$_SESSION["useralias"] = "mukti";
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Kattadoption</title>
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
                        <?php echo $_SESSION["useralias"]; ?>
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