<?php
require __DIR__ . '/config/config.php';

// Récupération des paramètres GET et nettoyage
$priceMin = isset($_GET['priceMin']) ? intval($_GET['priceMin']) : '';
$priceMax = isset($_GET['priceMax']) ? intval($_GET['priceMax']) : '';
$mileageMin = isset($_GET['mileageMin']) ? intval($_GET['mileageMin']) : '';
$mileageMax = isset($_GET['mileageMax']) ? intval($_GET['mileageMax']) : '';
$yearMin = isset($_GET['yearMin']) ? intval($_GET['yearMin']) : '';
$yearMax = isset($_GET['yearMax']) ? intval($_GET['yearMax']) : '';
/* $reset = isset($_GET['reset']); */
// Construction de la requête SQL en fonction des paramètres
$sql = "SELECT * FROM used_vehicules WHERE 1=1";
/* // REINITIALISER LES FILTRES
if ($reset) {
    $brand = null;
    $energy = null;
    $priceMin = "";
    $priceMax = "";
    $mileageMin = "";
    $mileageMax = "";
    $yearMin = "";
    $yearMax = "";
} */

if (!empty($_GET['priceMin'])) {
    $sql .= " AND price >= :priceMin";
}
if (!empty($_GET['priceMax'])) {
    $sql .= " AND price <= :priceMax";
}
if (!empty($_GET['mileageMin'])) {
    $sql .= " AND mileage >= :mileageMin";
}
if (!empty($_GET['mileageMax'])) {
    $sql .= " AND mileage <= :mileageMax";
}
if (!empty($_GET['yearMin'])) {
    $sql .= " AND year >= :yearMin";
}
if (!empty($_GET['yearMax'])) {
    $sql .= " AND year <= :yearMax";
}

$stmt = $pdo->prepare($sql);

// Liaison des paramètres
if (!empty($_GET['priceMin'])) {
    $stmt->bindValue(':priceMin', $_GET['priceMin'], PDO::PARAM_INT);
}

if (!empty($_GET['priceMax'])) {
    $stmt->bindValue(':priceMax', $_GET['priceMax'], PDO::PARAM_INT);
}

if (!empty($_GET['mileageMin'])) {
    $stmt->bindValue(':mileageMin', $_GET['mileageMin'], PDO::PARAM_INT);
}

if (!empty($_GET['mileageMax'])) {
    $stmt->bindValue(':mileageMax', $_GET['mileageMax'], PDO::PARAM_INT);
}

if (!empty($_GET['yearMin'])) {
    $stmt->bindValue(':yearMin', $_GET['yearMin'], PDO::PARAM_INT);
}

if (!empty($_GET['yearMax'])) {
    $stmt->bindValue(':yearMax', $_GET['yearMax'], PDO::PARAM_INT);
}

$stmt->execute();
$filteredVehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
/* $stmt = null; */

echo json_encode($filteredVehicules);
