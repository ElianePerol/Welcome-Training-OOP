<?php
require_once __DIR__ . '/../classes/user-auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new UserAuth($pdo);
    $auth->login($email, $password);
}
?>
