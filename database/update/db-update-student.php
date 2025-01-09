<?php
include_once __DIR__ . "/../../classes/update/update-student.php";

if(count($_POST) > 0 && isset($_POST['update-student'])) {
    $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : null;
    $surname = !empty($_POST['surname']) ? $_POST['surname'] : null;
    $email = !empty($_POST['email']) ? $_POST['email'] : null;
    $class_id = !empty($_POST['class_id']) ? $_POST['class_id'] : null;
    $id = $_POST['update-student'];

    $updateStudent = new UpdateStudent($pdo);
    $updateStudent->updateStudent($first_name, $surname, $email, $class_id, $id);
}
?>
