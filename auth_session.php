<!-- authentication session -->
<!-- säkerhetskontroll -->
<!-- om userid är satt loggas man in -->
<!-- annars skickas man tillbaka till login.php med header-anropet -->
<?php
session_start();
if (!isset($_SESSION["userid"])) {
    header("location: login.php");
    exit();
}
