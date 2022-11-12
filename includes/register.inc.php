<?php

if (isset($_POST["submit"])) {
  // Getting the data from the form
  $alias = $_POST["alias"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];

  include("../classes/dbh.classes.php");
  include("../classes/register.classes.php");
  include("../classes/register-controller.classes.php");

  // Instantiate registerController class
  $register = new RegisterController($alias, $pwd, $pwdrepeat, $email);

  // Running error handlers and user register
  $register->registerUser();

  // Going back front page
  header("location: ../index.php?error=none");
}
