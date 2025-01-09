<?php

class FetchAllStudents {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function fetchAllStudentsAndTheirClassName() {
        $sql = "SELECT u.id, u.first_name, u.surname, u.email, u.class_id, c.name AS class_name 
            FROM user u
            LEFT JOIN class c ON u.class_id = c.id 
            WHERE u.role = 'etudiant'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function fetchAllStudentsPerClassID($class_id) {
        $sql = "SELECT id, first_name, surname FROM user 
            WHERE class_id = :class_id AND role = 'etudiant'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
