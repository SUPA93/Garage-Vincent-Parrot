<?php
// Inclure le fichier de configuration de la base de données
include __DIR__ . "../config/config.php";

if (isset($_POST["add_user"])) {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $role = $_POST["role"];

    // Hasher le mot de passe
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    try {
        // Établir la connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateurs_parrot (nom, prenom, email, mot_de_passe, role) 
                VALUES (:nom, :prenom, :email, :mot_de_passe, :role)";

        // Préparer et exécuter la requête avec PDO
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        // Rediriger l'utilisateur après l'ajout
        header("Location: gestion_utilisateur.php"); // Remplacez cela par la page de destination souhaitée
        exit();
    } catch (PDOException $e) {
        die("La création de l'utilisateur a échoué : " . $e->getMessage());
    }
}
?>
