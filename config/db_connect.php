<?php
//skapar variabler för att kunna skapa koppling till databas
//koppling till lokal databasserver
$password = "Ia@rW(zRN.ydJi)c";
$servername = "localhost";
$username = "mukti";
$database = "kattadoption";

//koppling till databasserver
/* $password = "muktiMUKTI";
$servername = "localhost";
$username = "ackexyz_mukti";
$database = "ackexyz_kattadoption"; */


//kopplar databasen med PDO (php database object)
$conn = "mysql:host=$servername;dbname=$database;charset=UTF8";
try {
  //code...
  $pdo = new PDO($conn, $username, $password);
  if ($pdo) {
    //echo "Database $database is now connected...";
  }
} catch (PDOException $ex) {
  //throw $th;
  echo $ex->getMessage();
}
