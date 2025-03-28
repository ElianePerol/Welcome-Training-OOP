<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'eliane.perol@gmail.com';
        $mail->Password   = 'liqt hzxx laib fyho';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;


        $mail->setFrom('votre_email@gmail.com', 'Votre Nom');
        $mail->addAddress('eliane.perol@gmail.com', 'Nom Destinataire');

        $mail->isHTML(false);
        $mail->Subject = 'Demande de support';
        $mail->Body    = "Nom: $nom\nEmail: $email\nMessage: $message";

        $mail->send();
        $message_sent = true;
    } catch (Exception $e) {
        $message_sent = false;
    }
}

?>
