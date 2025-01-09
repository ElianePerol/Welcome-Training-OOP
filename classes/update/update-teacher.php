<?php

class UpdateTeacher {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function updateTeacher($first_name, $surname, $email, $id) {
        $sql = "UPDATE user SET
        first_name = :first_name,
        surname = :surname,
        email = :email
        WHERE id = :id";
            
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}

?>