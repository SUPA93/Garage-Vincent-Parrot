<?php

/* use PHPMailer\PHPMailer\PHPMailer; */

/* require __DIR__."/config/config_mail.php"; */

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $statut = $_POST["statut"];
    $societe = $_POST["societe"];
    $objet = $_POST["objet"];
    $email = $_POST["email"];
    $adress = $_POST["adress"];
    $message = $_POST["message"];

    $destinataire = "vparrot@gmail.com"; // Adresse e-mail de contact

    $sujet = "Formulaire de contact";
    $corps_message = "Nom : $nom\n";
    $corps_message .= "Prénom : $prenom\n";
    $corps_message .= "Statut : $statut\n";
    $corps_message .= "Société : $societe\n";
    $corps_message .= "Objet : $objet\n";
    $corps_message .= "Email : $email\n";
    $corps_message .= "Adresse : $adress\n";
    $corps_message .= "Message :\n$message\n";

    // En-têtes pour l'e-mail
    $entetes = "From: $email\r\n";
    $entetes .= "Reply-To: $email\r\n";

    // Envoyer l'e-mail
    if (mail($destinataire, $sujet, $corps_message, $entetes)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
}
