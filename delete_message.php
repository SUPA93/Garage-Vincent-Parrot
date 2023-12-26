<?php 
include_once __DIR__.'/config/config.php';
include_once __DIR__.'/PDOmessages.php';

$message_id = htmlentities($_GET['id']);

$sql = "DELETE FROM formulaire_contact WHERE id = :message_id";

try{
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':message_id', $message_id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: admin.php");
    exit();

}catch(PDOException $e) {
    echo "Erreur :" .$e->getMessage();
}


