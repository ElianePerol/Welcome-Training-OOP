<?php
include_once __DIR__ . "/../../classes/attendance/attendance-handler.php";

if (count($_POST) > 0) {
    
    $attendanceHandler = new AttendanceHandler($pdo);
    $attendanceHandler->SignAttendance($schedule_id, $student_id);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}