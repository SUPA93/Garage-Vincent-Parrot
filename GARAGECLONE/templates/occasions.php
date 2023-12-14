<?php
require_once "../lib/config.php";
require_once "../lib/pdo.php";
require_once __DIR__ . "/header.php";
require_once "../lib/cars.php";


/* require __DIR__ . "/occasion_sort.php"; */

// CLEAN AND GET PARAMETERS
$priceMin = isset($_GET['priceMin']) ? htmlspecialchars($_GET['priceMin'], ENT_QUOTES, 'UTF-8') : '';
$priceMax = isset($_GET['priceMax']) ? htmlspecialchars($_GET['priceMax'], ENT_QUOTES, 'UTF-8') : '';
$mileageMin = isset($_GET['mileageMin']) ? htmlspecialchars($_GET['mileageMin'], ENT_QUOTES, 'UTF-8') : '';
$mileageMax = isset($_GET['mileageMax']) ? htmlspecialchars($_GET['mileageMax'], ENT_QUOTES, 'UTF-8') : '';
$yearMin = isset($_GET['yearMin']) ? htmlspecialchars($_GET['yearMin'], ENT_QUOTES, 'UTF-8') : '';
$yearMax = isset($_GET['yearMax']) ? htmlspecialchars($_GET['yearMax'], ENT_QUOTES, 'UTF-8') : '';
?>
<section class="container">
    <h1>L'occasion</h1>

    <h2>Affinez les resultats</h2>
    <div class="filter-container">
        <?php
        /* FILTER USED CAR FORM CALLBACK */
        require __DIR__ . "/occasionsFilter_form.php";
        ?>
        <?php
        $sortedCars = getUsedVehicles($pdo);
        ?>
        <div class="grid-container">
            <?php
            if (!empty($sortedCars)) {
                foreach ($sortedCars as $car) {
            ?>
                    <div class="grid-item">
                        <a href="occasions_partial.php?id=<?= $car['id'] ?>" title="Plus de détails">
                            <img src="<?php echo $car['pictures']; ?>" alt="Image du véhicule" href="occasions_partial.php?id=<?= $car['id'] ?>" title="Plus de détails" />
                        </a>
                        <h3><?php echo $car['brand'] . ' ' . $car['model']; ?></h3>
                        <p>Année : <?php echo $car['year']; ?></p>
                        <p>Kilométrage : <?php echo $car['mileage']; ?> km</p>
                        <p>Energie : <?php echo $car['fuel_type']; ?></p>
                        <p>Couleur : <?php echo $car['color']; ?></p>
                        <p>Prix: <?php echo $car['price']; ?></p>
                        <button class="btninscription"><a href="occasions_partial.php?id=<?= $car['id'] ?>" title="Cliquez pour voir plus de détails">Plus de détails</a></button>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/footer.php";
?>