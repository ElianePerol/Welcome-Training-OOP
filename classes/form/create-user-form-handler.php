<?php

include_once "user-form.php";
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

    public function createUser() {
        $form = new UserForm;
        
        $hashedPassword = $this->pwdHash($form->password);
        
        $sql = "INSERT INTO user (first_name, surname, email, password, class_id, role) 
                VALUES (:first_name, :surname, :email, :password, :class, :role)";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':first_name', $form->first_name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $form->surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $form->email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':class', $form->class_id, PDO::PARAM_INT);
        $stmt->bindParam(':role', $form->role, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}

?>
