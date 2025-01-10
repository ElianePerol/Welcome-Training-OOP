<?php

class AttendanceHandler {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function MarkAttendance($schedule_id, $attendance) {
        foreach ($attendance as $student_id => $marked_attendance) {
            $sql = "INSERT INTO attendance (schedule_id, student_id, 
                    marked_attendance, signed_attendance)
                VALUES (:schedule_id, :student_id, :marked_attendance, NULL)
                ON DUPLICATE KEY UPDATE marked_attendance = :marked_attendance";
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute([
                ':schedule_id' => $schedule_id,
                ':student_id' => $student_id,
                ':marked_attendance' => $marked_attendance,
            ]);
        }
    }

    public function SendSignatureRequest($schedule_id, $student_id) {
        return "
            <form action='' method='POST'>
                <input type='hidden' name='schedule_id' value='$schedule_id' />
                <input type='hidden' name='student_id' value='$student_id' />
                <button type='submit' name='sign' class='btn btn-primary'>Sign</button>
            </form>
        ";
    }

    public function SignAttendance($schedule_id, $student_id) {
        $sql = "UPDATE attendance 
            SET signed_attendance = NOW()
            WHERE schedule_id = :schedule_id AND student_id = :student_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':schedule_id' => $schedule_id,
            ':student_id' => $student_id,
        ]);
    }
}

?>
