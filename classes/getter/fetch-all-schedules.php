<?php

class FetchAllSchedules {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAllSchedules() {
        $sql = "SELECT s.id, c.id AS class_id, c.name AS class_name, 
                sub.id AS subject_id, sub.name AS subject_name, 
                u.id AS teacher_id, u.first_name AS teacher_first_name, u.surname AS teacher_surname,
                s.start_datetime, s.end_datetime
            FROM schedule s
            LEFT JOIN class c ON s.class_id = c.id
            LEFT JOIN subject sub ON s.subject_id = sub.id
            LEFT JOIN user u ON s.teacher_id = u.id
            ORDER BY s.start_datetime";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Useful ???
    // public function fetchClassAndSubjectIDPerSchedule() {
    //     $sql = "SELECT s.class_id, s.subject_id FROM schedule s";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
?>
