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
                VALUES (:schedule_id, :student_id, :marked_attendance, NULL)";
                // -- ON DUPLICATE KEY UPDATE marked_attendance = :updated_marked_attendance
            $stmt = $this->pdo->prepare($sql);
            
            $stmt->execute([
                ':schedule_id' => $schedule_id,
                ':student_id' => $student_id,
                ':marked_attendance' => $marked_attendance,   
            ]);
        }
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

    public function isAttendanceMarked($schedule_id) {
        $sql = "SELECT COUNT(*) AS count FROM attendance 
            WHERE schedule_id = :schedule_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':schedule_id' => $schedule_id,
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    public function CheckAttendance ($schedule_id, $student_id) {
        $sql = "SELECT marked_attendance, signed_attendance 
                FROM attendance 
                WHERE schedule_id = :schedule_id AND student_id = :student_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':schedule_id' => $schedule_id,
            ':student_id' => $student_id,
        ]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result === false) {
            return [
                'marked_attendance' => false,
                'signed_attendance' => false
            ];
        }
    
        return [
            'marked_attendance' => (bool) $result['marked_attendance'],
            'signed_attendance' => !is_null($result['signed_attendance'])
        ];
        
    }

    public function ReturnAbsences($class_id, $student_id) {
        $sql = "SELECT a.student_id, a.schedule_id, 
                    s.start_datetime AS date, 
                    s.start_datetime AS time,
                    sub.name AS subject_name, 
                    CONCAT(t.first_name, ' ', t.surname) AS teacher_name
                FROM attendance a
                INNER JOIN schedule s ON a.schedule_id = s.id
                INNER JOIN subject sub ON s.subject_id = sub.id
                INNER JOIN user t ON s.teacher_id = t.id
                WHERE (a.marked_attendance = 0 OR (a.marked_attendance = 1 AND a.signed_attendance IS NULL))
                AND s.class_id = :class_id
                AND a.student_id = :student_id
                ORDER BY s.start_datetime";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ 
            ':class_id' => $class_id,
            ':student_id' => $student_id 
        ]);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>
