<?php

// Include database connection and CreateUser class
include_once "../database/db-connection.php";
include_once __DIR__ . "/../../classes/form/create-user-form-handler.php";


$user = new CreateUser($pdo);
$classes = $user->fetchClasses();

// Handle form submission
if (count($_POST) > 0) {

    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $class_id = !empty($_POST['class_id']) ? $_POST['class_id'] : null;

    if ($user->createUser($first_name, $surname, $email, $password, $role, $class_id)) {
        echo "<div class='alert alert-success text-center'>Utilisateur créé avec succès !</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Échec de la création de l'utilisateur.</div>";
    }
}
?>
