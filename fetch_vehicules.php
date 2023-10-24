<?php
require __DIR__ . '/config/config.php';
header('Content-Type: application/json');


// Récupération des paramètres GET et nettoyage
$priceMin = isset($_GET['priceMin']) ? htmlspecialchars($_GET['priceMin'], ENT_QUOTES, 'UTF-8') : '';
$priceMax = isset($_GET['priceMax']) ? htmlspecialchars($_GET['priceMax'], ENT_QUOTES, 'UTF-8') : '';
$mileageMin = isset($_GET['mileageMin']) ? htmlspecialchars($_GET['mileageMin'], ENT_QUOTES, 'UTF-8') : '';
$mileageMax = isset($_GET['mileageMax']) ? htmlspecialchars($_GET['mileageMax'], ENT_QUOTES, 'UTF-8') : '';
$yearMin = isset($_GET['yearMin']) ? htmlspecialchars($_GET['yearMin'], ENT_QUOTES, 'UTF-8') : '';
$yearMax = isset($_GET['yearMax']) ? htmlspecialchars($_GET['yearMax'], ENT_QUOTES, 'UTF-8') : '';

// Construction de la requête SQL en fonction des paramètres fournis
$sql = "SELECT * FROM used_vehicules WHERE 1=1"; // 1=1 pour faciliter l'ajout des conditions

if ($priceMin) {
    $sql .= " AND price >= :priceMin";
}
if ($priceMax) {
    $sql .= " AND price <= :priceMax";
}
if ($mileageMin) {
    $sql .= " AND mileage >= :mileageMin";
}
if ($mileageMax) {
    $sql .= " AND mileage <= :mileageMax";
}
if ($yearMin) {
    $sql .= " AND year >= :yearMin";
}
if ($yearMax) {
    $sql .= " AND year <= :yearMax";
}

$stmt = $pdo->prepare($sql);

// Liaison des paramètres
if ($priceMin) {
    $stmt->bindParam(':priceMin', $priceMin, PDO::PARAM_INT);
}
if ($priceMax) {
    $stmt->bindParam(':priceMax', $priceMax, PDO::PARAM_INT);
}
if ($mileageMin) {
    $stmt->bindParam(':mileageMin', $mileageMin, PDO::PARAM_INT);
}
if ($mileageMax) {
    $stmt->bindParam(':mileageMax', $mileageMax, PDO::PARAM_INT);
}
if ($yearMin) {
    $stmt->bindParam(':yearMin', $yearMin, PDO::PARAM_INT);
}
if ($yearMax) {
    $stmt->bindParam(':yearMax', $yearMax, PDO::PARAM_INT);
}

$stmt->execute();
$filteredVehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Renvoi des données au format JSON
echo json_encode($filteredVehicules);
