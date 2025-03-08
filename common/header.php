<?php
include_once "session-start.php";
include_once "../classes/user-auth.php";
include_once "../classes/render-header.php";

$userFirstName = $_SESSION['user_first_name'];
$userSurname = $_SESSION['user_surname'];
$userRole = $_SESSION['user_role'];
$className = $_SESSION['class_name'];

$user = new User($userFirstName, $userSurname, $userRole, $className);
$navigation = new Navigation();

$headerData = new RenderHeader($user, $navigation);

$userName = htmlspecialchars($headerData->getUserName());
$roleInfo = htmlspecialchars($headerData->getRoleInfo());
$navLinks = $headerData->getNavigationLinks();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome training - <?= $userRole ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="vh-100">

<header class="container-fluid py-1 position-fixed top-0 w-100">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <img src="../assets/img/logo.png" class="img-fluid logo-dark rounded-circle" alt="Logo Welcome Training">

            <h5 class="mb-0 text-white">
                <?= $userName . $roleInfo ?>
            </h5>
        </div>

        <nav class="d-flex align-items-center gap-3">
            <!-- Navbar dynamique -->
            <?php foreach ($navLinks as $link): ?>
                <a href="<?= $link['href'] ?>" class="nav-link bg-light border-0 fw-bold rounded-pill px-3 py-1"><?= $link['label'] ?></a>
            <?php endforeach; ?>

            <!--Bouton logout -->
            <a href="../common/logout.php" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Déconnexion">
                <i class="fa-solid fa-right-from-bracket fs-4"></i>
            </a>
        </nav>
    </div>
</header>