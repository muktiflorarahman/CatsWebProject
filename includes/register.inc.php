<?php
    if (isset($_POST['submit'])) {
       //får datat från formuläret 
       $alias = $_POST['alias'];
       $email = $_POST['email'];
       $pwd = $_POST['pwd'];
       $pwdRepeat = $_POST['pwdrepeat'];

      //includes av några klassfiler
      include("../classes/dbh.classes.php");
      include("../classes/register.classes.php");
      include("../classes/registerController.classes.php");

      //gör en instans av klassen RegisterController

      $register = new RegisterController($alias, $email, $pwd, $pwdRepeat); 

      //gå igenom felkontrollerna och registrera användaren
      $register->registerUser();


      //gå tillbaka till huvudsidan
      header("location: ../index.php?error=none");

      
      


    }