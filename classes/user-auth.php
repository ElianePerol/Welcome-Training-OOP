<?php
require_once __DIR__ . '/../database/db-connection.php';
require_once __DIR__ . '/redirect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class UserAuth {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        $sql = "SELECT u.*, c.name AS class_name 
                FROM `user` u
                LEFT JOIN class c ON u.class_id = c.id
                WHERE u.email = :email";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $this->initializeSession($user);
            $redirectUrl = $this->getRedirectUrl($user['role']);
            new Redirect($redirectUrl);
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            new Redirect("/login.php");
        }
    }

    private function initializeSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_surname'] = $user['surname'];
        $_SESSION['class_name'] = isset($user['class_name']) ? $user['class_name'] : 'No class assigned';

    }

    private function getRedirectUrl($role) {
        switch ($role) {
            case 'etudiant':
                return "../dashboard/student.php";
            case 'enseignant':
                return "../dashboard/teacher.php";
            case 'administrateur':
                return "../dashboard/admin.php";
            default:
                return "/login.php";
        }
    }

    public function getRoleFromSession() {
        return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
    }
    
}
?>
