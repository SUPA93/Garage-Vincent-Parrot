<?php 
include "PDOoccasions.php";

$article_id = $_GET['id'];

$sql = "DELETE FROM used_vehicules WHERE id = :article_id";

try {
    // Préparer la requête PDO
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();

    // Rediriger vers une page de confirmation ou une autre page
    header("Location: admin.php");
    exit();
} catch (PDOException $e) {
    // Gérer les erreurs PDO, par exemple, afficher un message d'erreur ou rediriger vers une page d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>