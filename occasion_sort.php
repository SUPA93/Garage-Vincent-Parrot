<?php

require __DIR__ . "/config/config.php";

// Vérifie si la variable GET "sortBy" est définie
if (isset($_GET["sortBy"])) {
    // Assainissez la valeur de "sortBy" pour éviter les attaques SQL
    $sortBy = $_GET["sortBy"];

    // Utilisez une requête préparée pour sécuriser la requête SQL
    $sql = "SELECT * FROM used_vehicules";

    switch ($sortBy) {
        // Utilisez des requêtes préparées pour chaque cas pour sécuriser les données
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
        case 'date-asc':
            $sql .= " ORDER BY ads_date ASC";
            break;
        case 'date-desc':
            $sql .= " ORDER BY ads_date DESC";
            break;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Récupérez les résultats de la requête
    $sortedCars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($sortedCars)) {
        foreach ($sortedCars as $car) {
            ?>
            <div class="grid-item">
                <img src="<?php echo $car['pictures']; ?>" alt="Image du véhicule">
                <h3><?php echo $car['brand'] . ' ' . $car['model']; ?></h3>
                <p>Année : <?php echo $car['year']; ?></p>
                <p>Kilométrage : <?php echo $car['mileage']; ?> km</p>
                <p>Energie : <?php echo $car['fuel_type']; ?></p>
                <p>Couleur : <?php echo $car['color']; ?></p>
                <p>Prix: <?php echo $car['price']; ?></p>
                <button class="btninscription"><a  href="occasion_detail.php?id=<?= $car['id'] ?>" title="Cliquez pour voir plus de détails" >Plus de détails</a></button>
            </div>
            <?php
        }
    } else {
        echo ('Pas de véhicules trouvés selon le critère de tri sélectionné.');
    }
}

error_log("Un message d'erreur ici", 0);
?>
