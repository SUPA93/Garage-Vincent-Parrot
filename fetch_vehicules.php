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

// Préparation et exécution de la requête
$stmt = $pdo->prepare($query);
$stmt->execute($params);

// Résultats au format JSON
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($results);
/* if (!empty($results)) {
    foreach ($results as $car) { 
?>
        <div class="grid-item">
            <a href="occasion_detail.php?id=<?= htmlspecialchars($car['id']) ?>" title="Plus de détails">
                <img src="<?= htmlspecialchars($car['pictures']); ?>" alt="Image du véhicule" href="occasion_detail.php?id=<?= htmlspecialchars($car['id']) ?>" title="Plus de détails" />
            </a>
            <h3><?= htmlspecialchars($car['brand'] . ' ' . $car['model']); ?></h3>
            <p>Année : <?= htmlspecialchars($car['year']); ?></p>
            <p>Kilométrage : <?= htmlspecialchars($car['mileage']); ?> km</p>
            <p>Energie : <?= htmlspecialchars($car['fuel_type']); ?></p>
            <p>Couleur : <?= htmlspecialchars($car['color']); ?></p>
            <p>Prix: <?= htmlspecialchars($car['price']); ?></p>
            <button class="btninscription"><a href="occasion_detail.php?id=<?= htmlspecialchars($car['id']) ?>" title="Cliquez pour voir plus de détails">Plus de détails</a></button>
        </div>
<?php
    }
} else {
    var_dump('erreur');
} */
?>