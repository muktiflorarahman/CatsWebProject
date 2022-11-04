<?php
    if (isset($_POST['submit'])) {
       //får datat från formuläret 
       $alias = $_POST['alias'];
       $email = $_POST['email'];
       $pwd = $_POST['pwd'];
       $pwdrepeat = $_POST['pwdrepeat'];

       echo ($alias);
       echo ($email);
       echo ($pwd);
       echo ($pwdrepeat);


    }