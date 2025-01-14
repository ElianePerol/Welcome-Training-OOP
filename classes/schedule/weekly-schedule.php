<?php

class WeeklySchedule {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function GetStudentSchedule($student_id) {
        $sql = "SELECT s.start_datetime, sub.name AS subject_name, 
                CONCAT(t.first_name, ' ', t.surname) AS teacher_name,
                DAYOFWEEK(s.start_datetime) AS day,
                DATE_FORMAT(s.start_datetime, '%H:00') AS start_time,
                DATE_FORMAT(s.end_datetime, '%H:00') AS end_time
            FROM schedule s
            INNER JOIN subject sub ON s.subject_id = sub.id
            INNER JOIN user t ON s.teacher_id = t.id
            INNER JOIN attendance a ON a.schedule_id = s.id
            WHERE a.student_id = :student_id
            ORDER BY s.start_datetime";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ ':student_id' => $student_id ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetTeacherSchedule($teacher_id) {
        $sql = "SELECT s.start_datetime, sub.name AS subject_name, 
                c.name AS class_name,
                DAYOFWEEK(s.start_datetime) AS day,
                DATE_FORMAT(s.start_datetime, '%H:00') AS start_time,
                DATE_FORMAT(s.end_datetime, '%H:00') AS end_time
            FROM schedule s
            INNER JOIN subject sub ON s.subject_id = sub.id
            INNER JOIN class c ON s.class_id = c.id
            WHERE s.teacher_id = :teacher_id
            ORDER BY s.start_datetime";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([ ':teacher_id' => $teacher_id ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetWeekDates() {
        $today = new DateTime();
        $dayOfWeek = $today->format('N'); // Get day of the week (1 = Monday, 7 = Sunday)
        $startOfWeek = $today->modify('-' . ($dayOfWeek - 1) . ' days'); // Go back to Monday

        $weekDates = [];
        for ($i = 0; $i < 5; $i++) {
            $weekDates[] = $startOfWeek->modify('+1 day')->format('d/m/Y');
        }

        return $weekDates;
    }
}

?>
