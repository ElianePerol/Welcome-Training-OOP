<?php
include_once __DIR__ . "/../../classes/update/update-schedule.php";

if (count($_POST) > 0 && isset($_POST['update-schedule'])) {

    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $id = $_POST['update-schedule'];

    $start_datetime = $start_date . ' ' . $start_time;
    $end_datetime = $start_date . ' ' . $end_time;

    $updateSchedule = new UpdateSchedule($pdo);
    $updateSchedule->updateSchedule($class_id, $subject_id, 
    $teacher_id, $start_datetime, $end_datetime, $id);

}
?>