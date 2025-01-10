<?php
include_once "../classes/getter/fetch-today-schedule.php";

$fetchTodaySchedules = new FetchTodaySchedules($pdo);
$schedules = $fetchTodaySchedules->studentSchedules();
$no_class_today = empty($schedules);

?>