<?php
include_once __DIR__ . "/../../classes/attendance/attendance-handler.php";

$attendanceFinished = false;

if (count($_POST) > 0) {
    $attendanceHandler = new AttendanceHandler($pdo);
    $schedule_id = $ongoingSchedule[0]['schedule_id'];
    $attendanceHandler->MarkAttendance($schedule_id, $_POST['marked_attendance']);

    $_SESSION['attendance_finished'] = true;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$attendanceHandler = new AttendanceHandler($pdo);
if ($attendanceHandler->isAttendanceMarked($ongoingSchedule[0]['schedule_id'])) {
    $attendanceFinished = true;
}

?>