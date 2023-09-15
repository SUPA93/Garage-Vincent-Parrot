<?php
//Insèrer les messages users dans la table.
include_once __DIR__.'/config/config.php';

try {
    // Établir la connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    // Définition du mode d'erreur PDO à exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $statut = $_POST["statut"];
        $societe = $_POST["societe"];
        $objet = $_POST["objet"];
        $email = $_POST["email"];
        $adress = $_POST["adress"];
        $fichier = $_POST["fichier"]; 
        $message = $_POST["message"];
        $date_submission = date("Y-m-d H:i:s");

        // Requête SQL pour l'insertion des données
        $sql = "INSERT INTO formulaire_contact (nom, prenom, statut, societe, objet, email, adress, fichier, message, date_submission) 
                VALUES (:nom, :prenom, :statut, :societe, :objet, :email, :adress, :fichier, :message, :date_submission)";

        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':statut', $statut);
        $stmt->bindParam(':societe', $societe);
        $stmt->bindParam(':objet', $objet);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adress', $adress);
        $stmt->bindParam(':fichier', $fichier);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':date_submission', $date_submission);

        // Exécution de la requête
        $stmt->execute();

        echo "Le message a été inséré avec succès dans la base de données.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$pdo = null;

?>
