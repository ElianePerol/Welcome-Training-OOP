<?php 
session_start();

if (!isset($_SESSION['user_id']) && 
    strpos($_SERVER['REQUEST_URI'], "login.php") === false ||
    strpos($_SERVER['REQUEST_URI'], "db-login.php") !== false) {
        header("Location: login.php");
    }
    
 ?>