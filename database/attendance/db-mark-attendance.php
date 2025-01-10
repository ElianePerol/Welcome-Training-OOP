<?php
include_once __DIR__ . "/../../classes/attendance/attendance-handler.php";

if (count($_POST) > 0) {

    $attendanceHandler = new AttendanceHandler($pdo);
    $schedule_id = $ongoingSchedule[0]['schedule_id'];
    $attendanceHandler->MarkAttendance($schedule_id, $_POST['marked_attendance']);
}

?>