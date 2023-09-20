<?php 
include_once __DIR__ . '/config/config.php';

try {
    $stmt = $pdo->prepare("SELECT id, svc_name, svc_price, svc_time FROM services");
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de requête : " . $e->getMessage();
}
if (isset($_POST['add_service_btn'])) {
    $svc_name = $_POST["svc_name"];
    $svc_price = $_POST["svc_price"];
    $svc_time = $_POST["svc_time"];

    try {
        $stmt = $pdo->prepare("INSERT INTO services (svc_name, svc_price, svc_time) VALUES (:svc_name, :svc_price, :svc_time)");
        $stmt->bindParam(':svc_name', $svc_name, PDO::PARAM_STR);
        $stmt->bindParam(':svc_price', $svc_price, PDO::PARAM_STR);
        $stmt->bindParam(':svc_time', $svc_time, PDO::PARAM_STR);
        $stmt->execute();
        echo "Service ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du service : " . $e->getMessage();
    }
}

?>