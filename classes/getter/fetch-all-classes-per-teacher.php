<?php

class FetchAllClassesPerTeacher {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchClassesByTeacher($teacher_id) {
        $sql = "SELECT DISTINCT c.id, c.name
                FROM class c
                INNER JOIN schedule s ON c.id = s.class_id
                WHERE s.teacher_id = :teacher_id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':teacher_id' => $teacher_id]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
