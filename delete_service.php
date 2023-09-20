<?php

include_once __DIR__ . '/config/config.php';
//bouton lien supprimé dans le form
if (isset($_GET['id'])) {
    $serviceId = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(':id', $serviceId, PDO::PARAM_INT);
        $stmt->execute();
        echo "Service supprimé avec succès.";
        header("Location: admin.php");
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du service : " . $e->getMessage();
    }
} else {
    echo "ID du service non spécifié.";
}
?>