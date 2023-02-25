<?php
session_start(); # session startar
$_SESSION = array();
session_unset();
session_destroy();

// echo "Utloggad!";
header("Location: index.php?error=none");
exit(); # NOTE THE EXIT
