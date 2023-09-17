<?php
// Insérer les avis des utilisateurs dans la table.
include_once __DIR__.'/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        // Vérifiez si le champ caché 'my_form_identifier' est défini
    if (isset($_POST['my_form_identifier']) && $_POST['my_form_identifier'] === 'my_unique_value') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['famillyName']; 
        $feedback = $_POST['userMessage'];
        $note = $_POST['userRating'];
        $valide = false; // false par défaut

        $sql = "INSERT INTO user_feedback (first_name, last_name, feedback, note, valide) VALUES (:firstName, :lastName, :feedback, :note, :valide)";

        try {
            $stmt = $pdo->prepare($sql); 
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName); 
            $stmt->bindParam(':feedback', $feedback);
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':valide', $valide); 
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement de l'avis : " . $e->getMessage();
        }
    }
}


$sql = "SELECT id, first_name, last_name, feedback, note, valide FROM user_feedback";
$feedbacks = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
