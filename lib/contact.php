<?php

include_once __DIR__ . "/pdo.php";

$pdo = connectToDatabase();

function insertMessage($pdo, $nom, $prenom, $statut, $societe, $objet, $email, $adress, $fichier, $message)
{
    $date_submission = date("Y-m-d H:i:s");
    $sql = "INSERT INTO formulaire_contact (nom, prenom, statut, societe, objet, email, adress, fichier, message, date_submission) 
            VALUES (:nom, :prenom, :statut, :societe, :objet, :email, :adress, :fichier, :message, :date_submission)";
    try {
        $stmt = $pdo->prepare($sql);
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
        $stmt->execute();

        
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function getMessages($pdo)
{
    $sql = "SELECT * FROM formulaire_contact";
    try {
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }
}

function deleteMessage($pdo, $message_id)
{
    $sql = "DELETE FROM formulaire_contact WHERE id = :message_id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':message_id', $message_id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur :" . $e->getMessage();
    }
}
// Check the form submitted
if (isset($_POST['send_contact_form']) || isset($_POST['occasion_contact_form'])) {
    $nom = htmlentities($_POST["nom"], ENT_QUOTES, 'UTF-8');
    $prenom = isset($_POST["prenom"]) ? htmlentities($_POST["prenom"], ENT_QUOTES, 'UTF-8') : '';
    $statut = isset($_POST["statut"]) ? htmlentities($_POST["statut"], ENT_QUOTES, 'UTF-8') : '';
    $societe = htmlentities($_POST["societe"] ?? '', ENT_QUOTES, 'UTF-8');
    $email = htmlentities($_POST["email"], ENT_QUOTES, 'UTF-8');
    $adress = htmlentities($_POST["adress"] ?? '', ENT_QUOTES, 'UTF-8');
    $fichier = htmlentities($_POST["fichier"] ?? '', ENT_QUOTES, 'UTF-8');
    $message = htmlentities($_POST["message"], ENT_QUOTES, 'UTF-8');
    
    if (isset($_POST['occasion_contact_form'])) {
        $vehicle_brand = htmlentities($_POST['vehicle_brand'], ENT_QUOTES, 'UTF-8');
        $vehicle_model = htmlentities($_POST['vehicle_model'], ENT_QUOTES, 'UTF-8');
        $vehicleId = htmlentities($_POST['vehicle_id'], ENT_QUOTES, 'UTF-8');
        $objet = $vehicle_brand . "_" . $vehicle_model;
    } else {
        $objet = htmlentities($_POST["objet"], ENT_QUOTES, 'UTF-8');
    }

    insertMessage($pdo, $nom, $prenom, $statut, $societe, $objet, $email, $adress, $fichier, $message);

    // header location handler for forms
    if (isset($_POST['send_contact_form'])) {
        header('Location: ../index.php');
        exit();
    } elseif (isset($_POST['occasion_contact_form'])) {
        header('Location: ../templates/occasions_partial.php?id='. $vehicleId ); 
        exit();
    }
}

// Check delete request made
if (isset($_GET['delete_id'])) {
    deleteMessage($pdo, htmlentities($_GET['delete_id'], ENT_QUOTES, 'UTF-8'));
    header("Location: /templates/admin.php"); // Assurez-vous que cette URL est correcte
    exit();
}
// Retrieve all messages
$messages = getMessages($pdo);
