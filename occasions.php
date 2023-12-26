<?php

require_once __DIR__ . "/templates/header.php";
require __DIR__ . "/occasion_sort.php";

// Récupération et nettoyage des paramètres GET
$priceMin = isset($_GET['priceMin']) ? htmlspecialchars($_GET['priceMin'], ENT_QUOTES, 'UTF-8') : '';
$priceMax = isset($_GET['priceMax']) ? htmlspecialchars($_GET['priceMax'], ENT_QUOTES, 'UTF-8') : '';
$mileageMin = isset($_GET['mileageMin']) ? htmlspecialchars($_GET['mileageMin'], ENT_QUOTES, 'UTF-8') : '';
$mileageMax = isset($_GET['mileageMax']) ? htmlspecialchars($_GET['mileageMax'], ENT_QUOTES, 'UTF-8') : '';
$yearMin = isset($_GET['yearMin']) ? htmlspecialchars($_GET['yearMin'], ENT_QUOTES, 'UTF-8') : '';
$yearMax = isset($_GET['yearMax']) ? htmlspecialchars($_GET['yearMax'], ENT_QUOTES, 'UTF-8') : '';
?>
<section class="container">
    <h1>L'occasion</h1>
    <!-- <h2>Nos véhicules d'occasion sont vérifiés & remis en état par nos soins</h2> -->
    <h2>Affinez les resultats</h2>
    <div class="filter-container">
        <form method="GET" id="filterForm" class="form-control p-4">
            <label for="price">Prix :</label>
            <div id="price-slider" class="mb-3"></div>
            <input type="hidden" id="priceMin" name="priceMin" value="<?= htmlspecialchars($priceMin) ?>">
            <input type="hidden" id="priceMax" name="priceMax" value="<?= htmlentities($priceMax) ?>">
            <div id="price-values"></div>
            <hr class="divider">
            <br>
            <label for="kilometrage">Kilométrage :</label>
            <div id="kilometrage-slider" class="mb-3"></div>
            <input type="hidden" id="mileageMin" name="mileageMin" value="<?= htmlentities($mileageMin) ?>">
            <input type="hidden" id="mileageMax" name="mileageMax" value="<?= htmlentities($mileageMax) ?>">
            <div id="kilometrage-values"></div>
            <hr class="divider">
            <br>
            <label for="annee">Années :</label>
            <div id="annee-slider" class="mb-3"></div>
            <input type="hidden" id="yearMin" name="yearMin" value="<?= htmlentities($yearMin) ?>">
            <input type="hidden" id="yearMax" name="yearMax" value="<?= htmlentities($yearMax) ?>">
            <div id="annee-values"></div>
            <hr class="divider">
            <br>
            <button type="submit" class="btn btn-warning m-2" name="reset" value="true">Réinitialiser</button>
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