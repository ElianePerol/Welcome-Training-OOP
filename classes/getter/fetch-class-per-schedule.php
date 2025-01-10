<?php

class FetchClassPerSchedule {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchClassPerSchedule($schedule_id) {
        $sql = "SELECT class.id AS class_id, 
                class.name AS class_name FROM schedule
            INNER JOIN class ON schedule.class_id = class.id
            WHERE schedule.id = :schedule_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>