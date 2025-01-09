<?php
include_once __DIR__ . "/../../classes/update/update-class.php";

if (count($_POST) > 0 && isset($_POST['update-class'])) {

    $class_name = $_POST['name'];
    $class_id = $_POST['update-class'];

    $updateClass = new UpdateClass($pdo);
    $updateClass->updateClass($class_name, $class_id);

}

?>

