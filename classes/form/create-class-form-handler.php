<?php

class CreateClass {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createClass($class_name) {
        $sql = "INSERT INTO class (name) VALUES (:class_name)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':class_name', $class_name, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}

?>
