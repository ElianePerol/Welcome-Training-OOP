<?php
include_once "fetch-subject-per-schedule.php";
include_once "fetch-class-per-schedule.php";
include_once "fetch-teacher-per-schedule.php";

class FetchOngoingSchedules {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchOngoingSchedule() {
        $sql = "SELECT id AS schedule_id, subject_id, class_id, teacher_id, 
                DATE(start_datetime) AS date, 
                TIME(start_datetime) AS start_time, 
                TIME(end_datetime) AS end_time 
            FROM schedule 
            WHERE DATE(start_datetime) = DATE(NOW()) AND 
                TIME(NOW()) BETWEEN TIME(start_datetime) AND TIME(end_datetime)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function studentSchedule() {
        $ongoingSchedule = $this->fetchOngoingSchedule();
        if ($ongoingSchedule === false) {
            return [];
        }
    
        $subjectFetcher = new FetchSubjectPerSchedule($this->pdo);
        $teacherFetcher = new FetchTeacherPerSchedule($this->pdo);
    
        $studentSchedule = [];
        $subject = $subjectFetcher->fetchSubjectPerSchedule($ongoingSchedule['schedule_id']);
        $teacher = $teacherFetcher->fetchTeacherPerSchedule($ongoingSchedule['schedule_id']);
    
        $studentSchedule[] = [
            'schedule_id' => $ongoingSchedule['schedule_id'],
            'date' => $ongoingSchedule['date'],
            'start_time' => $ongoingSchedule['start_time'],
            'end_time' => $ongoingSchedule['end_time'],
            'subject' => $subject['subject_name'],
            'teacher' => ($teacher['first_name']) . ' ' . ($teacher['surname'])
        ];
    
        return $studentSchedule;
    }
    
    public function teacherSchedule() {
        $ongoingSchedule = $this->fetchOngoingSchedule();
        if ($ongoingSchedule === false) {
            return [];
        }
    
        $subjectFetcher = new FetchSubjectPerSchedule($this->pdo);
        $classFetcher = new FetchClassPerSchedule($this->pdo);
    
        $teacherSchedule = [];
        $subject = $subjectFetcher->fetchSubjectPerSchedule($ongoingSchedule['schedule_id']);
        $class = $classFetcher->fetchClassPerSchedule($ongoingSchedule['schedule_id']);
    
        $teacherSchedule[] = [
            'schedule_id' => $ongoingSchedule['schedule_id'],
            'date' => $ongoingSchedule['date'],
            'start_time' => $ongoingSchedule['start_time'],
            'end_time' => $ongoingSchedule['end_time'],
            'subject' => $subject['subject_name'],
            'class' => $class['class_name']
        ];
    
        return $teacherSchedule;
    }    
}
?>