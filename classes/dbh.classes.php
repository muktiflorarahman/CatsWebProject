<?php
    class Dbh{
        protected function connect() {
            try {
                //code...
                $username = "root";
                $password = ""; 
                $dbh = new PDO("mysql:host=localhost;dbname=kattadoption", $username, $password);
            } catch (PDOException $ex) {
                //throw $ex;
                print("error: " . $ex->getMessage() . "<br>"); 
                die(); 
            }
        }
    }