<?php
include_once "../classes/getter/fetch-today-schedule.php";
include_once "../classes/getter/fetch-ongoing-schedule.php";
include_once "../classes/attendance/attendance-handler.php";

$fetchTodaySchedules = new FetchTodaySchedules($pdo);
$schedules = $fetchTodaySchedules->studentSchedules();

$fetchOngoingSchedules = new FetchOngoingSchedules($pdo);
$ongoingSchedule = $fetchOngoingSchedules->studentSchedule();

$no_class_today = empty($schedules);

if (empty($ongoingSchedule)) {
    $current_teacher_name = "";
    $current_subject_name = "";
} else {
    $current_teacher_name = "Enseignant : " . $ongoingSchedule[0]['teacher'];
    $current_subject_name = "Matière : " . $ongoingSchedule[0]['subject'];

    $schedule_id = $ongoingSchedule[0]['schedule_id'];
    $student_id = $_SESSION['user_id'];

    $attendanceHandler = new AttendanceHandler($pdo);
    $attendanceStatus = $attendanceHandler->CheckAttendance($schedule_id, $student_id);

    $marked_attendance = $attendanceStatus['marked_attendance'];
    $is_signed = $attendanceStatus['signed_attendance'];

}

?>