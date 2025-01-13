<?php
include_once "session-start.php";
include_once "../classes/user-auth.php";

$userAuth = new UserAuth($pdo);
$userRole = $userAuth->getRoleFromSession();

$userFirstName = isset($_SESSION['user_first_name']) ? $_SESSION['user_first_name'] : '';
$userSurname = isset($_SESSION['user_surname']) ? $_SESSION['user_surname'] : '';
$className = isset($_SESSION['class_name']) ? $_SESSION['class_name'] : '';

 ?>

<!doctype html>
<html lang="fr">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome training - Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="vh-100">

    <header class="container-fluid py-1 position-fixed top-0 w-100">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-3">
                <img src="../assets/img/logo.png" class="img-fluid logo-dark rounded-circle" alt="Logo Welcome Training">

                <!-- User's info -->
                <h5 class="mb-0 text-white">
                <?php 
                    // Name
                    if ($userFirstName || $userSurname) {
                        echo htmlspecialchars($userFirstName) . ' ' . htmlspecialchars($userSurname);
                    } else {
                        echo ucfirst($userRole);
                    }

                    // Role
                    if ($userRole === 'administrateur') {
                        echo ' - Administrateur';
                    } elseif ($userRole === 'etudiant') {
                        echo ' - Classe : ' . htmlspecialchars($className);
                    } elseif ($userRole === 'enseignant') {
                        echo ' - Enseignant';
                    }
                    
                ?>
                </h5>

            </div>

            <nav class="d-flex align-items-center gap-3">

                <!-- Admin nav -->
                <?php if ($userRole === 'administrateur'): ?>
                    <a href="../dashboard/admin.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Tableau de bord</a>
                    <a href="../display-list/list-students.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Étudiants</a>
                    <a href="../display-list/list-teachers.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Enseignants</a>
                    <a href="../display-list/list-classes-admin.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Classes</a>
                    <a href="../display-list/list-subjects.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Matières</a>
                    <a href="../display-list/list-schedules.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Plannings</a>
                
                <!-- Student nav -->
                <?php elseif ($userRole === 'etudiant'): ?>
                    <a href="../dashboard/student.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Accueil</a>
                    <a href="../schedule/schedule-student.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Emploi du temps</a>
                    <a href="../attendance/attendance.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Absences</a>
                
                <!-- Teacher nav -->
                <?php elseif ($userRole === 'enseignant'): ?>
                    <a href="../dashboard/teacher.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Accueil</a>
                    <a href="../schedule/schedule-teacher.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Emploi du temps</a>
                    <a href="../list/list-class-teacher.php" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1">Classes</a>
                <?php endif; ?>

                <!-- Logout button -->
                <a href="../common/logout.php" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Déconnexion">
                    <i class="fa-solid fa-right-from-bracket fs-4"></i>
                </a>
            </nav>
        </div>
    </header>