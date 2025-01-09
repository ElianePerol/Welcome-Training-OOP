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
        // Fetch user by their email
        $sql = "SELECT u.*, c.name AS class_name 
                FROM `user` u
                LEFT JOIN class c ON u.class_id = c.id
                WHERE u.email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Valid credentials, initialize session
            $this->initializeSession($user);
            // Redirect based on role
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


        // Bit of code initially thought to get the schedules ids for a teacher
        // if ($user['role'] === 'enseignant') {
        //     $this->setTeacherSchedule($user['id']);
        // }
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

    // Bit of code initially thought to get the schedule for a teacher
    // private function setTeacherSchedule($teacherId) {
    //     $current_time = date('Y-m-d H:i:s');
    //     $sql = "SELECT s.id AS schedule_id, c.name AS class_name, sub.name AS subject_name
    //             FROM schedule s
    //             JOIN class c ON s.class_id = c.id
    //             JOIN subject sub ON s.subject_id = sub.id
    //             WHERE s.teacher_id = :teacher_id
    //             AND :current_time BETWEEN s.start_datetime AND s.end_datetime";
        
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam(':teacher_id', $teacherId, PDO::PARAM_INT);
    //     $stmt->bindParam(':current_time', $current_time, PDO::PARAM_STR);
    //     $stmt->execute();

    //     if ($schedule = $stmt->fetch()) {
    //         $_SESSION['schedule_id'] = $schedule['schedule_id'];
    //         $_SESSION['class_name'] = $schedule['class_name'];
    //         $_SESSION['subject_name'] = $schedule['subject_name'];
    //     } else {
    //         $_SESSION['schedule_id'] = null;
    //     }
    // }

}
?>
