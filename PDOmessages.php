<?php
//Insèrer les messages users dans la table.
include __DIR__ . '/config/config.php';

// Vérifie si le formulaire a été soumis
if (isset($_POST['send_contact_form'])) {
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
    try {
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
        //redirection
        header('Location: index.php');       
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Récupération des messages depuis la table formulaire_contact
    $sql = "SELECT * FROM formulaire_contact";
    $stmt = $pdo->query($sql);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données : " . $e->getMessage();
}
