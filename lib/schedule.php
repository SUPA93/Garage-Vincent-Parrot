<?php

$pdo = connectToDatabase();
// Fonction pour récupérer les horaires depuis la base de données
function getHoraires($pdo) {
    try {
        $sql = "SELECT jour_semaine, heure_ouverture, heure_fermeture FROM horaires";
        $stmt = $pdo->query($sql);
        $horaires = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $jour = strtolower($row['jour_semaine']);
            $horaires[$jour] = [
                'ouverture' => $row['heure_ouverture'],
                'fermeture' => $row['heure_fermeture'],
            ];
        }
        return $horaires;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des horaires : " . $e->getMessage();
        return [];
    }
}

// Fonction pour mettre à jour les horaires dans la base de données
function updateHoraires($pdo, $day, $opening_time, $closing_time) {
    $sql = "UPDATE horaires SET heure_ouverture = :heure_ouverture, heure_fermeture = :heure_fermeture WHERE jour_semaine = :jour_semaine";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":heure_ouverture", $opening_time, PDO::PARAM_STR);
        $stmt->bindParam(":heure_fermeture", $closing_time, PDO::PARAM_STR);
        $stmt->bindParam(":jour_semaine", $day, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        // Vous pouvez choisir de renvoyer l'erreur ou de la gérer différemment
        return "Erreur lors de la mise à jour des horaires : " . $e->getMessage();
    }
    return true;
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["day"])) {
    $day = ucfirst(strtolower($_POST["day"]));
    $opening_time = $_POST["opening_time"];
    $closing_time = $_POST["closing_time"];

    // Appeler la fonction de mise à jour des horaires
    $updateResult = updateHoraires($pdo, $day, $opening_time, $closing_time);

    if ($updateResult === true) {
        // Rediriger vers admin.php après la mise à jour réussie
        header("Location: admin.php");
        exit();
    } else {
        // Gérer l'erreur de mise à jour
        $errorMessage = $updateResult;
    }
}

// Appeler la fonction pour récupérer les horaires
$horaires = getHoraires($pdo);
?>
