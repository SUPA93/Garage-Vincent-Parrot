<?php 
var_dump("config_mail_loaded");
require "../../../vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Adresse du serveur SMTP
$mail->SMTPAuth = true;
$mail->Username = 'vparrot0@gmail.com'; // Votre adresse e-mail SMTP
$mail->Password = 'Vilallauis93350@'; // Votre mot de passe SMTP
$mail->SMTPSecure = 'tls'; // TLS ou SSL
$mail->Port = 587; // Port SMTP (587 pour TLS ou 465 pour SSL)


$mail->setFrom('vparrot0@gmail.com', 'Vincent Parrot');
$mail->addAddress('destinataire@example.com', 'Destinataire');
$mail->Subject = 'Sujet de l\'e-mail';
$mail->Body = 'Contenu de l\'e-mail';

if ($mail->send()) {
    echo 'E-mail envoyé avec succès';
} else {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
}
?>