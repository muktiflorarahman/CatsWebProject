<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">

  <title>Document</title>
</head>

<body>

  <div class="wrapper">
    <header>

      <nav>
        <div class="nav-logo">
          <a href="index.php"><img src="res/logo.png" width="75px" height="75px" alt="Cats logo" /></a>
        </div>
        <div class="nav-links">
          <ul class="menu-main">
            <li><a href="index.php">HOME</a></li>
            <li><a href="adoption.php">ADOPTIONS</a></li>
            <li><a href="about.php">ABOUT</a></li>
          </ul>
        </div>
        <div class="nav-buttons">
          <ul class="menu-member">
            <?php
            if (isset($_SESSION["userid"])) {
            ?>
              <li><a href="#" class="header-register-a">
                  <?php echo $_SESSION["useralias"]; ?>
                </a></li>
              <li><a href="includes/logout.inc.php" class="header-login-a">LOGOUT</a></li>
            <?php
            } else {
            ?>
              <li><a href="register.php" class="header-register-a">REGISTER</a></li>
              <li><a href="login.php" class="header-login-a">LOGIN</a></li>
            <?php
            }
            ?>
          </ul>
        </div>
      </nav>
    </header>
  </div>

  <div class="wrapper">