<?php

class UpdateStudent {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function updateStudent($first_name, $surname, $email, $class_id, $id) {
        $sql = "UPDATE user SET
        first_name = :first_name,
        surname = :surname,
        email = :email,
        class_id = :class_id
        WHERE id = :id";
            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}

?>