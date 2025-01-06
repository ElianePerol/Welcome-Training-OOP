<?php

include_once __DIR__ . "/../getter/fetch-all-classes.php";


class CreateUser {
    private $pdo;
    private $fetchClass;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->fetchClass = new FetchAllClasses($pdo);
    }

    private function pwdHash($pwd) {
        $options = [
            'cost' => 12,
        ];
        return password_hash($pwd, PASSWORD_BCRYPT, $options);
    }

    public function fetchClasses() {
        return $this->fetchClass->fetchAllClasses();
    }

    public function createUser($first_name, $surname, $email, $password, $role, $class_id = null) {
        $hashedPassword = $this->pwdHash($password);
        
        $sql = "INSERT INTO user (surname, first_name, email, password, role, class_id) 
                VALUES (:surname, :first_name, :email, :password, :role, :class)";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':class', $class_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}

?>
