<?php

class FetchAllTeachers {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAllTeachers() {
        $sql = "SELECT id, first_name, surname, email FROM user WHERE role = 'enseignant'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>