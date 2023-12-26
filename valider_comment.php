<?php
// Inclure le fichier de configuration de la base de données
include_once __DIR__.'/config/config.php';

// Vérifier si l'ID de l'avis à valider est présent dans l'URL
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $avisId = $_GET['id'];

    // Exécuter une requête pour obtenir l'état actuel de 'valide' de l'avis
    $sqlSelect = "SELECT valide FROM user_feedback WHERE id = :id";

    try {
        $stmtSelect = $pdo->prepare($sqlSelect);
        $stmtSelect->bindParam(':id', $avisId);
        $stmtSelect->execute();

        $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $valideActuel = $result['valide'];

            // Inverser l'état 'valide'
            $nouvelEtatValide = !$valideActuel;

            // Exécuter une requête pour mettre à jour l'état 'valide' de l'avis dans la base de données
            $sqlUpdate = "UPDATE user_feedback SET valide = :valide WHERE id = :id";

            $stmtUpdate = $pdo->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':id', $avisId);
            $stmtUpdate->bindParam(':valide', $nouvelEtatValide, PDO::PARAM_BOOL);
            $stmtUpdate->execute();
        }

        // Rediriger l'utilisateur vers la page précédente (admin.php dans ce cas)
        header("Location: admin.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'avis : " . $e->getMessage();
    }
}
?>
