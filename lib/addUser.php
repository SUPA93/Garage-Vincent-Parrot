<?php
session_start();
require_once __DIR__ . "/connexions.php";
include_once __DIR__ . "/pdo.php";

function addUser($pdo, $nom, $prenom, $email, $mot_de_passe, $role)
{
    // Vérifier si l'email existe déjà
    $sqlVerif = "SELECT * FROM utilisateurs_parrot WHERE email = :email";
    $stmtVerif = $pdo->prepare($sqlVerif);
    $stmtVerif->bindParam(':email', $email, PDO::PARAM_STR);

    $stmtVerif->execute();

    if ($stmtVerif->rowCount() > 0) {
        // Email existe déjà
        return "Un utilisateur avec cet email existe déjà.";
    } else {
        // Hash mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        try {
            // Préparer la requête 
            $sql = "INSERT INTO utilisateurs_parrot (nom, prenom, email, mot_de_passe, role) 
                VALUES (:nom, :prenom, :email, :mot_de_passe_hash, :role)";


            // Préparer et exécuter PDO
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
            $stmt->bindParam(':role', $role);
            $stmt->execute();

            // message de succès
            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            // message d'erreur
            return "La création de l'utilisateur a échoué : " . $e->getMessage();
        }
    }
}

if (isset($_POST["add_user"])) {
    if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") {
        // les données 
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);
        $role = htmlspecialchars($_POST["role"]);

        // Établir la connexion 
        $pdo = connectToDatabase();

        // Appeler la fonction 
        $result = addUser($pdo, $nom, $prenom, $email, $mot_de_passe, $role);

        // Vérifier le résultat 
        if (strpos($result, 'succès') !== false) {
            $_SESSION['success_message'] = $result;
            header("Location: ../templates/admin.php");
            exit();
        } else {
            die($result);
        }
    } else {
        $errorMessage = "Vous n'avez pas les droits pour la création d'utilisateurs!";
        // ... Afficher le message d'erreur ...
    }
}
