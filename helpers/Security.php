<?php
    abstract class Security {
        public static function onlyLoggedInUsers() {
            session_start();
            if(!isset($_SESSION['username'])){
                header("Location: login.php");
            }
        }
    }
    //voor zien of de user is ingelogd/sessie 
?>

