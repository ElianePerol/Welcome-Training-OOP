<?php 
include_once "../classes/getter/fetch-today-schedule.php";
include_once "../classes/getter/fetch-ongoing-schedule.php";
include_once "../classes/getter/fetch-all-students-per-schedule.php";

$fetchTodaySchedules = new FetchTodaySchedules($pdo);
$schedules = $fetchTodaySchedules->teacherSchedules();

$fetchOngoingSchedules = new FetchOngoingSchedules($pdo);
$ongoingSchedule = $fetchOngoingSchedules->teacherSchedule(); 

$no_class_today = empty($schedules);

if (empty($ongoingSchedule)) {
    $current_class_name = "";
    $current_subject_name = "";
} else {
    $current_class_name = "Classe : " . $ongoingSchedule[0]['class'];
    $current_subject_name = "Matière : " . $ongoingSchedule[0]['subject'];
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