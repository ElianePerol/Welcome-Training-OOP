<?php 
include_once "../classes/getter/fetch-today-schedule.php";
include_once "../classes/getter/fetch-ongoing-schedule.php";
include_once "../classes/getter/fetch-all-students-per-schedule.php";

$fetchTodaySchedules = new FetchTodaySchedules($pdo);
$fetchOngoingSchedules = new FetchOngoingSchedules($pdo);

$schedules = $fetchTodaySchedules->teacherSchedules();
$no_class_today = empty($schedules);

$ongoingSchedule = $fetchOngoingSchedules->teacherSchedule();
var_dump($ongoingSchedule);
if (empty($ongoingSchedule)) {
    $current_class_name = "Aucune classe en cours";
    $current_subject_name = "Aucune matière en cours";
} else {
    $current_class_name = $ongoingSchedule[0]['class'] ?? "Aucune classe en cours";
    $current_subject_name = $ongoingSchedule[0]['subject'] ?? "Aucune matière en cours";
}

$students = [];
if (!empty($ongoingSchedule)) {
  $schedule_id = $ongoingSchedule[0]['schedule_id'] ?? null;
  if ($schedule_id) {
      $studentFetcher = new FetchAllStudentPerSchedule($pdo);
      $students = $studentFetcher->fetchAllStudentPerSchedule($schedule_id);
  }
}

?>