<?php

if (isset($_POST["submit"])) {
  // Getting the data from the form
  $alias = $_POST["alias"];
  $pwd = $_POST["pwd"];

  // Instantiate loginController class
  include("../classes/dbh.classes.php");
  include("../classes/login.classes.php");
  include("../classes/login-controller.classes.php");
  $login = new LoginController($alias, $pwd);

  // Running error handlers and user login
  $login->loginUser();

  // Going back front page
  header("location: ../index.php?error=none");
}
