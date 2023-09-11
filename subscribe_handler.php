<?php
session_start();
include "./config/config.php"; // Inclure le fichier de configuration avec les informations de connexion

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

    // Vous devez vous connecter à votre base de données ici (utilisation de PDO)
    $dbHost = "localhost";
    $dbName = "vparrot";
    $dbUser = "root";
    $dbPassword = "";

    try {
        // Établir la connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (email, mot_de_passe, civilite, nom, prenom, ville, code_postal, adresse, newsletter)
                VALUES (:email, :password, :civilite, :nom, :prenom, :ville, :code_postal, :adresse, :newsletter)";

        // Préparer et exécuter la requête avec PDO
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':civilite', $civilite);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':code_postal', $code_postal);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':newsletter', $newsletter);

        if ($stmt->execute()) {
            // L'insertion a réussi
            $_SESSION["user_email"] = $email;

            // Vous pouvez rediriger l'utilisateur vers une page de confirmation ou une autre page de votre choix
            header("Location: index.php");
            exit();
        } else {
            // L'insertion a échoué
            $errorMessage = "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }

    // Fermer la connexion à la base de données
    $pdo = null;
}
?>
