<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Method not Allowed');
}

// reCAPTCHA validatie
// $secretKey = '#';
// $responseKey = $_POST['g-recaptcha-response'] ?? '';
// $userIP = $_SERVER['REMOTE_ADDR'];

// if (empty($responseKey)) {
//     die("reCAPTCHA verificatie mislukt. Probeer het opnieuw.");
// }

// $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
// $response = file_get_contents($url);
// $responseKeys = json_decode($response, true);
// print_r($response);
// if (intval($responseKeys["success"]) !== 1) {
//     die("reCAPTCHA verificatie mislukt. Probeer het opnieuw.");
// }

$form_type = $_POST['form_type'] ?? '';
$voornaam = $_POST['voornaam'] ?? '';
$achternaam = $_POST['achternaam'] ?? '';
$email = $_POST['email'] ?? '';
$telefoon = $_POST['telefoon'] ?? '';
$bericht = $_POST['bericht'] ?? '';

$to = "#";
$subject = "Nieuwe inschrijving";
$message = "Er is een nieuwe contact ontvangen.<br><br>";
$message .= "Naam: " . $voornaam . " " . $achternaam . "<br>";
$message .= "E-mail: " . $email . "<br>";
$message .= "Telefoonnummer: " . $telefoon . "<br>";
$message .= "Bericht: " . $bericht . "<br>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = '#';
    $mail->SMTPAuth   = #;
    $mail->Username   = '#';
    $mail->Password   = '#';
    $mail->SMTPSecure = '#';
    $mail->Port       = #;

        $mail->setFrom($to, "#");
    $mail->addBCC('#');
    $mail->addReplyTo($email, "$voornaam $achternaam");

    $mail->isHTML(true);
    $mail->Subject = 'Nieuwe ContactFormulier';
    $mail->Body    = $message;

    $mail->send();
    header('Location: ../success.html');
    exit;
} catch (Exception $e) {
    error_log("E-mail verzenden mislukt. Fout: {$mail->ErrorInfo}");
    die("Er is een probleem opgetreden bij het verzenden van de e-mail. Probeer het opnieuw.");
}
