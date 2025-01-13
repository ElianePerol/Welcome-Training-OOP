<?php
include_once __DIR__ . "/../../classes/update/update-teacher.php";

if(count($_POST) > 0 && isset($_POST['update-teacher'])) {
    $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : null;
    $surname = !empty($_POST['surname']) ? $_POST['surname'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $id = $_POST['update-teacher'];

    $updateTeacher = new UpdateTeacher($pdo);
    $updateTeacher->updateTeacher($first_name, $surname, $email, $id);
}

?>
