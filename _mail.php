<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'quanticode.contact@gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tonadresse@gmail.com';      // Ton adresse Gmail
    $mail->Password   = 'mot_de_passe_ou_app_password'; // Mot de passe d'application Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('tonadresse@gmail.com', 'Quanticode');
    $mail->addAddress($email, $username);

    $mail->isHTML(true);
    $mail->Subject = 'Bienvenue sur Quanticode !';
    $mail->Body    = "Bonjour <b>$username</b>,<br>Votre inscription a bien été prise en compte.<br>Bienvenue sur Quanticode !";
    $mail->AltBody = "Bonjour $username, Votre inscription a bien été prise en compte. Bienvenue sur Quanticode !";

    $mail->send();
    echo "Inscription réussie, un e-mail de bienvenue a été envoyé.";
} catch (Exception $e) {
    echo "Inscription réussie, mais l'e-mail n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
}
// Crée un mot de passe d’application dans la sécurité de ton compte Google : essayer en compte personnel si le compte pro ne propose pas la fonctionnalité "mot de passe application"
// Utilise ce mot de passe d’application à la place de ton mot de passe Gmail dans $mail->Password.