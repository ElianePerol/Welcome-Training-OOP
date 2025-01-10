<?php

class FetchTeacherPerSchedule {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchTeacherPerSchedule($schedule_id) {
        $sql = "SELECT user.id AS teacher_id, 
                user.first_name AS first_name,
                user.surname AS surname
            FROM schedule 
            INNER JOIN user ON schedule.teacher_id = user.id
            WHERE schedule.id = :schedule_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':schedule_id', $schedule_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>