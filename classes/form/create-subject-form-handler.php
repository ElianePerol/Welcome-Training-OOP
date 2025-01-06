<?php

class CreateSubject {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createSubject($subject_name) {
        $sql = "INSERT INTO subject (name) VALUES (:subject_name)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}

?>
