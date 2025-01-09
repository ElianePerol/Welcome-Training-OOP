<?php
include_once __DIR__ . "/../../classes/update/update-subject.php";

if (count($_POST) > 0 && isset($_POST['update-subject'])) {

    $subject_name = $_POST['name'];
    $subject_id = $_POST['update-subject'];

    $updateSubject = new UpdateSubject($pdo);
    $updateSubject->updateSubject($subject_name, $subject_id);

}

?>

