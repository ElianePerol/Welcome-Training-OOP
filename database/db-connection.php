<?php

if (file_exists(__DIR__ . '/../classes/database-connection.php')) {
    include_once __DIR__ . '/../classes/database-connection.php';
} else {
    include_once __DIR__ . '/classes/database-connection.php';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbConnection = new DatabaseConnection();
$pdo = $dbConnection->getPDO();

// var_dump($pdo);

?>