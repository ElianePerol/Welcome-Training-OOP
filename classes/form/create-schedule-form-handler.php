<?php 

include_once "schedule-form.php";
include_once __DIR__ . "/../getter/fetch-all-subjects.php";
include_once __DIR__ . "/../getter/fetch-all-teachers.php";
include_once __DIR__ . "/../getter/fetch-all-classes.php";


class CreateSchedule {

    private $pdo;
    private $fetchSubjects;
    private $fetchTeachers;
    private $fetchClasses;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->fetchSubjects = new FetchAllSubjects($pdo);
        $this->fetchTeachers = new FetchAllTeachers($pdo);
        $this->fetchClasses = new FetchAllClasses($pdo);

    }

    public function fetchSubjects() {
        return $this->fetchSubjects->fetchAllSubjects();
    }

    public function fetchTeachers() {
        return $this->fetchTeachers->fetchAllTeachers();
    }

    public function fetchClasses() {
        return $this->fetchClasses->fetchAllClasses();
    }

    public function createSchedule() {
        $form = new ScheduleForm();
        
        $sql_schedule = "INSERT INTO schedule (subject_id, class_id, teacher_id, start_datetime, end_datetime) 
                        VALUES (:subject_id, :class_id, :teacher_id, :start_datetime, :end_datetime)";

        $stmt_schedule = $this->pdo->prepare($sql_schedule);
        $stmt_schedule->bindParam(':subject_id', $form->subject_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':class_id', $form->class_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':teacher_id', $form->teacher_id, PDO::PARAM_INT);
        $stmt_schedule->bindParam(':start_datetime', $form->start_datetime_str, PDO::PARAM_STR);
        $stmt_schedule->bindParam(':end_datetime', $form->end_datetime_str, PDO::PARAM_STR);
        
        return $stmt_schedule->execute();
    }
}

?>