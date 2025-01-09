<?php
include_once __DIR__ . "/../../classes/delete/delete-entry.php";

if (count($_POST) > 0) {
    $deleteEntry = new DeleteEntry($pdo);

    if (isset($_POST['delete-class'])) {
        $deleteEntry->delete('class', $_POST['delete-class']);
    }

    if (isset($_POST['delete-schedule'])) {
        $deleteEntry->delete('schedule', $_POST['delete-schedule']);
    }

    if (isset($_POST['delete-student'])) {
        $deleteEntry->delete('user', $_POST['delete-student']);
    }

    if (isset($_POST['delete-subject'])) {
        $deleteEntry->delete('subject', $_POST['delete-subject']);
    }

    if (isset($_POST['delete-teacher'])) {
        $deleteEntry->delete('user', $_POST['delete-teacher']);
    }
}

?>
