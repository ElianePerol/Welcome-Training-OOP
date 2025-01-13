<?php
include_once "fetch-subject-per-schedule.php";
include_once "fetch-class-per-schedule.php";
include_once "fetch-teacher-per-schedule.php";

class FetchTodaySchedules {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchTodaySchedules() {
        $sql = "SELECT id AS schedule_id, subject_id, class_id, teacher_id, 
                DATE(start_datetime) AS date, 
                TIME(start_datetime) AS start_datetime, 
                TIME(end_datetime) AS end_datetime 
            FROM schedule 
            WHERE DATE(start_datetime) = CURDATE()
            ORDER BY start_datetime ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function studentSchedules() {
        $schedules = $this->fetchTodaySchedules();
        $subjectFetcher = new FetchSubjectPerSchedule($this->pdo);
        $teacherFetcher = new FetchTeacherPerSchedule($this->pdo);

        $studentSchedule = [];
        foreach ($schedules as $schedule) {
            $subject = $subjectFetcher->fetchSubjectPerSchedule($schedule['schedule_id']);
            $teacher = $teacherFetcher->fetchTeacherPerSchedule($schedule['schedule_id']);

            $studentSchedule[] = [
                'date' => $schedule['date'],
                'start_time' => $schedule['start_datetime'],
                'end_time' => $schedule['end_datetime'],
                'subject' => $subject['subject_name'],
                'teacher' => ($teacher['first_name'] ?? '') . ' ' . ($teacher['surname'])
            ];
        }

        return $studentSchedule;
    }


    public function teacherSchedules() {
        $schedules = $this->fetchTodaySchedules();
        $subjectFetcher = new FetchSubjectPerSchedule($this->pdo);
        $classFetcher = new FetchClassPerSchedule($this->pdo);

        $teacherSchedule = [];
        foreach ($schedules as $schedule) {
            $subject = $subjectFetcher->fetchSubjectPerSchedule($schedule['schedule_id']);
            $class = $classFetcher->fetchClassPerSchedule($schedule['schedule_id']);

            $teacherSchedule[] = [
                'date' => $schedule['date'],
                'start_time' => $schedule['start_datetime'],
                'end_time' => $schedule['end_datetime'],
                'subject' => $subject['subject_name'],
                'class' => $class['class_name']
            ];
        }

        return $teacherSchedule;
    }
}
