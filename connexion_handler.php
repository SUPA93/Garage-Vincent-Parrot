<?php
session_start();

// Remplacez ces valeurs par vos informations de base de données
$correctEmail = "votre_email@example.com";
$correctPasswordHash = password_hash("votre_mot_de_passe", PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérifiez si les informations de connexion sont correctes
    if ($email === $correctEmail && password_verify($password, $correctPasswordHash)) {
        // Authentification réussie
        $_SESSION["user_email"] = $email;
        
        // Vous pouvez définir le rôle ici en fonction de vos besoins
        $userRole = "user"; // Par exemple, "user" ou "admin"

        // Redirigez l'utilisateur en fonction de son rôle
        if ($userRole === "admin") {
            header("Location: admin.php");
            exit();
        } else {
            header("Location: user.php");
            exit();
        }
    } else {
        // Authentification échouée
        $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>
