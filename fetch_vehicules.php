<?php
require __DIR__.'/config/config.php';


// Récupération des valeurs des sliders
$price = $_POST["price"];
$mileage = $_POST["mileage"];
$year = $_POST["year"];

// Requête SQL pour récupérer les véhicules filtrés
$query = "SELECT * FROM vehicles WHERE price <= :price AND mileage <= :mileage AND year >= :year";
$statement = $pdo->prepare($query);
$statement->bindParam(":price", $price, PDO::PARAM_INT);
$statement->bindParam(":mileage", $mileage, PDO::PARAM_INT);
$statement->bindParam(":year", $year, PDO::PARAM_INT);
$statement->execute();

// Renvoyer les résultats au format JSON
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
?>
