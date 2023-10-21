<?php
require __DIR__ . '/config/config.php';

// Initialisation
$query = "SELECT * FROM used_vehicules WHERE 1=1";
$params = [];

if (isset($_GET["price"])) {
    $price = explode(',', htmlspecialchars($_GET["price"]));
    $query .= " AND price BETWEEN :priceMin AND :priceMax";
    $params[":priceMin"] = $price[0];
    $params[":priceMax"] = $price[1];
}

if (isset($_GET["mileage"])) {
    $mileage = explode(',', htmlspecialchars($_GET["mileage"]));
    $query .= " AND mileage BETWEEN :mileageMin AND :mileageMax";
    $params[":mileageMin"] = $mileage[0];
    $params[":mileageMax"] = $mileage[1];
}

if (isset($_GET["year"])) {
    $year = explode(',', htmlspecialchars($_GET["year"]));
    $query .= " AND year BETWEEN :yearMin AND :yearMax";
    $params[":yearMin"] = $year[0];
    $params[":yearMax"] = $year[1];
}

// Prépa exécution de la requête
$stmt = $pdo->prepare($query);
$stmt->execute($params);

// JSON
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($results);


?>