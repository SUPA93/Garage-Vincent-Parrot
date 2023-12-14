<!-- FILE FOR USER'S REVIEWS -->
<?php
include_once __DIR__. "/pdo.php";

$pdo = connectToDatabase();


function sendFeedback($pdo, $firstName, $lastName, $feedback, $note) {
    $valide = false; // false by default
    $sql = "INSERT INTO user_feedback (first_name, last_name, feedback, note, valide) VALUES (:firstName, :lastName, :feedback, :note, :valide)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':valide', $valide);
        $stmt->execute();

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement de l'avis : " . $e->getMessage();
    }
}
function getFeedbacks($pdo) {
    $sql = "SELECT id, first_name, last_name, feedback, note, valide FROM user_feedback";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
function deleteFeedback($pdo, $comment_id) {
    $sql = "DELETE FROM user_feedback WHERE id = :comment_id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../templates/admin.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
function validateFeedback($pdo, $avisId) {
    $sqlSelect = "SELECT valide FROM user_feedback WHERE id = :id";

    try {
        $stmtSelect = $pdo->prepare($sqlSelect);
        $stmtSelect->bindParam(':id', $avisId);
        $stmtSelect->execute();

        $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $nouvelEtatValide = !$result['valide'];

            $sqlUpdate = "UPDATE user_feedback SET valide = :valide WHERE id = :id";
            $stmtUpdate = $pdo->prepare($sqlUpdate);
            $stmtUpdate->bindParam(':id', $avisId);
            $stmtUpdate->bindParam(':valide', $nouvelEtatValide, PDO::PARAM_BOOL);
            $stmtUpdate->execute();
        }

        header("Location: ../templates/admin.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'avis : " . $e->getMessage();
    }
}
if (isset($_POST['send_feedback'])) {
    sendFeedback($pdo, $_POST['firstName'], $_POST['familyName'], $_POST['userMessage'], $_POST['userRating']);
}
if (isset($_POST['delete_feedback'])) {
    deleteFeedback($pdo, $_POST['id']);
}
if (isset($_POST['validate_feedback'])) {
    validateFeedback($pdo, $_POST['id']);
}
$feedbacks = getFeedbacks($pdo);
?>
