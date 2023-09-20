<?php 

require_once __DIR__ . "/config/config.php";


$sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'year-asc';


$sql = "SELECT * FROM used_vehicules";

switch ($sortBy) {
    case 'year-asc':
        $sql .= " ORDER BY year ASC";
        break;
    case 'year-desc':
        $sql .= " ORDER BY year DESC";
        break;
    case 'mileage-asc':
        $sql .= " ORDER BY mileage ASC";
        break;
    case 'mileage-desc':
        $sql .= " ORDER BY mileage DESC";
        break;
    case 'price-asc':
        $sql .= " ORDER BY price ASC";
        break;
    case 'price-desc':
        $sql .= " ORDER BY price DESC";
        break;
}
$stmt = $pdo->prepare($sql);
$stmt->execute();


$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


