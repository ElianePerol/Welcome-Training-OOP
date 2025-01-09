<?php

class UserForm {
    
    public $first_name;
    public $surname;
    public $email;
    public $password;
    public $role;
    public $class_id;

    public function __construct() {
        $this->fetchForm();
    }

    private function fetchForm() {
        $this->first_name = $_POST['first_name'];
        $this->surname = $_POST['surname'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->role = $_POST['role'];
        $this->class_id = !empty($_POST['class_id']) ? $_POST['class_id'] : null;
    }

}