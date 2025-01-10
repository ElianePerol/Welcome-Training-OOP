<?php

class FetchSubjectPerSchedule {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchSubjectPerSchedule($schedule_id) {
        $sql = "SELECT subject.id AS subject_id, 
                subject.name AS subject_name FROM schedule
            INNER JOIN subject ON schedule.subject_id = subject.id
            WHERE schedule.id = :schedule_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>
