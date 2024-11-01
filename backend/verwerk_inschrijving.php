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

// if (intval($responseKeys["success"]) !== 1) {
//     die("reCAPTCHA verificatie mislukt. Probeer het opnieuw.");
// }

// Formuliergegevens ophalen en schoonmaken
$form_type = $_POST['form_type'] ?? '';
$voornaam = htmlspecialchars(trim($_POST['voornaam'] ?? ''));
$achternaam = htmlspecialchars(trim($_POST['achternaam'] ?? ''));
$geboortedatum = htmlspecialchars(trim($_POST['geboortedatum'] ?? ''));
$geslacht = htmlspecialchars(trim($_POST['geslacht'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$telefoon = htmlspecialchars(trim($_POST['telefoon'] ?? ''));
$adres = htmlspecialchars(trim($_POST['adres'] ?? ''));
$postcode = htmlspecialchars(trim($_POST['postcode'] ?? ''));
$woonplaats = htmlspecialchars(trim($_POST['woonplaats'] ?? ''));
$ervaring = htmlspecialchars(trim($_POST['ervaring'] ?? ''));
$tijden = htmlspecialchars(trim($_POST['tijden'] ?? ''));
$pakket = htmlspecialchars(trim($_POST['pakket'] ?? ''));

$to = "#";
$subject = "Nieuwe inschrijving";
$message = "Er is een nieuwe inschrijving ontvangen.<br><br>";
$message .= "Naam: $voornaam $achternaam<br>";
$message .= "Geboortedatum: $geboortedatum<br>";
$message .= "Geslacht: $geslacht<br>";
$message .= "E-mail: $email<br>";
$message .= "Telefoonnummer: $telefoon<br>";
$message .= "Adres: $adres<br>";
$message .= "Postcode: $postcode<br>";
$message .= "Woonplaats: $woonplaats<br>";
$message .= "Ervaring: $ervaring<br>";
$message .= "Tijden: $tijden<br>";
$message .= "Pakket: $pakket<br>";

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
    $mail->Subject = 'Nieuwe inschrijving';
    $mail->Body    = $message;

    $mail->send();
    header('Location: ../success.html');
    exit;
} catch (Exception $e) {
    error_log("E-mail verzenden mislukt. Fout: {$mail->ErrorInfo}");
    die("Er is een probleem opgetreden bij het verzenden van de e-mail. Probeer het opnieuw.");
}
