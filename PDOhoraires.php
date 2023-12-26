<?php
// Inclure le fichier de configuration
include_once __DIR__ . '/config/config.php';

// Récupérer les horaires depuis la base de données
try {
    $sql = "SELECT jour_semaine, heure_ouverture, heure_fermeture FROM horaires";
    $stmt = $pdo->query($sql);

    // Créer un tableau associatif avec les horaires
    $horaires = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $jour = strtolower($row['jour_semaine']);
        $heure_ouverture = $row['heure_ouverture'];
        $heure_fermeture = $row['heure_fermeture'];

        $horaires[$jour] = [
            'ouverture' => $heure_ouverture,
            'fermeture' => $heure_fermeture,
        ];
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des horaires : " . $e->getMessage();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["day"])) {
    // Récupérer les données du formulaire
    $day = ucfirst(strtolower($_POST["day"]));
    $opening_time = $_POST["opening_time"];
    $closing_time = $_POST["closing_time"];

    // Préparer la requête SQL pour mettre à jour les horaires
    $sql = "UPDATE horaires SET heure_ouverture = :heure_ouverture, heure_fermeture = :heure_fermeture WHERE jour_semaine = :jour_semaine";

    try {
        // Préparation de la requête
        $stmt = $pdo->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(":heure_ouverture", $opening_time, PDO::PARAM_STR);
        $stmt->bindParam(":heure_fermeture", $closing_time, PDO::PARAM_STR);
        $stmt->bindParam(":jour_semaine", $day, PDO::PARAM_STR);

        // Exécution de la requête
        $stmt->execute();

        // Rediriger vers admin.php après la mise à jour réussie
        header("Location: admin.php");
        exit(); // Assurez-vous de quitter le script après la redirection
    } catch (PDOException $e) {
        // En cas d'erreur, vous pouvez gérer l'erreur ici
        $errorMessage = "Erreur lors de la mise à jour des horaires : " . $e->getMessage();
    }
}
