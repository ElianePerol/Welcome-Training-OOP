<?php

class FetchAllStudentPerSchedule {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAllStudentPerSchedule($schedule_id) {

        $classFetcher = new FetchClassPerSchedule($this->pdo);
        $class = $classFetcher->fetchClassPerSchedule($schedule_id);
        $class_id = $class['class_id'];

        $sql = "SELECT id AS student_id, first_name, surname FROM user 
            WHERE class_id = :class_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>