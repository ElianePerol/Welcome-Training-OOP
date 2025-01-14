<?php

class User {
    private $firstName;
    private $surname;
    private $role;
    private $className;


    // Assigne les références (&) aux attributs
    public function __construct(&$firstName, &$surname, &$role, &$className) {
        $this->firstName = &$firstName;
        $this->surname = &$surname;
        $this->role = &$role;
        $this->className = &$className;
    }

    // Retourne le nom par référence
    // Permet de modifier le nom
    public function &getFullName() {
        $fullName = $this->firstName . ' ' . $this->surname;
        return $fullName;
    }

    // Retourne le role dans un format string
    public function getRoleInfo() {
        switch ($this->role) { // Y accède par référence
            case 'administrateur':
                return ' - Administrateur';
            case 'etudiant':
                return ' - Classe : ' . htmlspecialchars($this->className);
            case 'enseignant':
                return ' - Enseignant';
            default:
                return '';
        }
    }

    // Retourne le role par référence
    public function getRole() {
        return $this->role;
    }

}

?>