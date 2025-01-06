<?php
include_once __DIR__ . "/../../classes/form/create-schedule-form-handler.php";

$schedule_form = new CreateSchedule($pdo);

$subjects = $schedule_form->fetchSubjects();
$teachers = $schedule_form->fetchTeachers();
$classes = $schedule_form->fetchClasses();

if(count($_POST) > 0) {
    $schedule_form->createSchedule();
}

?>

