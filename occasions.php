<?php

require_once __DIR__ . "/templates/header.php";
require __DIR__ . "/occasion_sort.php";

?>
<section class="container">
    <h1>L'occasion</h1>
    <h2>Nos véhicules d'occasion sont vérifiés & remis en état par nos soins</h2>
    <h3>Affinez les resultats</h3>
    <div class="filter-container">
        <form action="" method="GET" class="filter-form">
            <select name="brand" id="brand-type" class="filter-select">
                <option value="" selected>Marques</option>
                <?php foreach ($brands as $brand) : ?>
                    <option value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
                <?php endforeach; ?>
            </select>

            <select name="fuel_type" id="fuel-type" class="filter-select">
                <option value="" selected>Carburant</option>
                <?php foreach ($fuelTypes as $fuelType) : ?>
                    <option value="<?php echo $fuelType; ?>"><?php echo $fuelType; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="price-slider" class="slider-label">Prix :</label>
            <div class="slider-container">
                <div id="price-slider"></div>
                <div class="slider-values"><span id="priceMin"></span> € - <span id="priceMax"></span> €</div>
            </div>

            <label for="mileage-slider" class="slider-label">Kilométrage :</label>
            <div class="slider-container">
                <div id="mileage-slider"></div>
                <div class="slider-values"><span id="mileageMin"></span>-<span id="mileageMax"></span> km</div>
            </div>

            <label for="year-slider" class="slider-label">Années :</label>
            <div class="slider-container">
                <div id="year-slider"></div>
                <div class="slider-values"><span id="yearMin"></span> - <span id="yearMax"></span></div>
            </div>

            <button type="submit" class="reset-button" name="reset" value="true">Réinitialiser</button>
            <button type="submit" class="filter-button">Filtrer</button>
        </form>
    </div>



    <form id="filterForm" class="inscription">
        <label for="sortBy">Trier par :</label>
        <select id="sortBy" name="sortBy">
            <option value="year-asc">Année croissante</option>
            <option value="year-desc">Année décroissante</option>
            <option value="mileage-asc">Kilométrage croissant</option>
            <option value="mileage-desc">Kilométrage décroissant</option>
            <option value="price-asc">Prix croissant</option>
            <option value="price-desc">Prix décroissant</option>
            <option value="date-desc">Plus récent</option>
            <option value="date-asc">Moins récent</option>
        </select>
    </form>
    <?php
    $sql = "SELECT * FROM used_vehicules";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $sortedCars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="grid-container">
        <?php
        if (!empty($sortedCars)) {
            foreach ($sortedCars as $car) {
        ?>
                <div class="grid-item">
                    <a href="occasion_detail.php?id=<?= $car['id'] ?>" title="Plus de détails">
                        <img src="<?php echo $car['pictures']; ?>" alt="Image du véhicule" href="occasion_detail.php?id=<?= $car['id'] ?>" title="Plus de détails" />
                    </a>
                    <h3><?php echo $car['brand'] . ' ' . $car['model']; ?></h3>
                    <p>Année : <?php echo $car['year']; ?></p>
                    <p>Kilométrage : <?php echo $car['mileage']; ?> km</p>
                    <p>Energie : <?php echo $car['fuel_type']; ?></p>
                    <p>Couleur : <?php echo $car['color']; ?></p>
                    <p>Prix: <?php echo $car['price']; ?></p>
                    <button class="btninscription"><a href="occasion_detail.php?id=<?= $car['id'] ?>" title="Cliquez pour voir plus de détails">Plus de détails</a></button>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>
<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>