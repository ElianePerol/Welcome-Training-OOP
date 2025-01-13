<?php
include_once __DIR__ . "/../../classes/form/create-user-form-handler.php";

$user_form = new CreateUser($pdo);

$classes = $user_form->fetchClasses();

if (count($_POST) > 0) {
    $user_form->createUser();

}

?>
