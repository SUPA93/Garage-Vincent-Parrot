<?php
session_start();

// Remplacez ces valeurs par vos informations de base de données
$correctEmail = "votre_email@example.com";
$correctPasswordHash = password_hash("votre_mot_de_passe", PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $civilite = $_POST["civilite"];
    $nom = $_POST["lastName"];
    $prenom = $_POST["firstName"];
    $ville = $_POST["city"];
    $code_postal = $_POST["zipCode"];
    $adresse = $_POST["address"];
    $newsletter = isset($_POST["newsletter"]) ? 1 : 0; // Vérifie si la case à cocher "newsletter" est cochée

    // Vous devez vous connecter à votre base de données ici (utilisation de mysqli, PDO, etc.)
    $dbHost = "votre_hôte_mysql";
    $dbUser = "votre_utilisateur_mysql";
    $dbPassword = "votre_mot_de_passe_mysql";
    $dbName = "votre_base_de_données";

    // Établir la connexion à la base de données (à remplacer par votre propre méthode)
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer un nouvel utilisateur
    $sql = "INSERT INTO utilisateurs (email, mot_de_passe, civilite, nom, prenom, ville, code_postal, adresse, newsletter)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Préparer et exécuter la requête
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $email, $password, $civilite, $nom, $prenom, $ville, $code_postal, $adresse, $newsletter);

    if ($stmt->execute()) {
        // L'insertion a réussi
        $_SESSION["user_email"] = $email;

        // Vous pouvez rediriger l'utilisateur vers une page de confirmation ou une autre page de votre choix
        header("Location: confirmation.php");
        exit();
    } else {
        // L'insertion a échoué
        $errorMessage = "Erreur lors de l'inscription. Veuillez réessayer.";
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>
