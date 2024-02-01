<?php
require_once "header.php";
require_once "../lib/cars.php";

$vehicle = getVehicleForEdit($pdo, $_GET['id'] ?? null);
?>
<section class="inscription">
    <form method="post" enctype="multipart/form-data">
        <button type="button" title="Retour administration" class="btninscription">
            <a href="admin.php">Retour</a>
        </button>
        <fieldset>
            <!-- UPDATE CAR FORM -->
            <input type="hidden" name="id" value="<?= $vehicle['id'] ?>">
            <h2>Modifier un véhicule</h2>
            <label for="brand">Marque:</label>
            <input type="text" name="brand" id="brand" value="<?= $vehicle['brand'] ?>">

            <label for="model">Modèle:</label>
            <input type="text" name="model" id="model" value="<?= $vehicle['model'] ?>">

            <label for="color">Couleur:</label>
            <input type="text" name="color" id="color" value="<?= $vehicle['color'] ?>">

            <label for="mileage">Kilométrage :</label>
            <input type="number" id="mileage" name="mileage" value="<?= $vehicle['mileage'] ?>">

            <label for="year">Année:</label>
            <input type="number" name="year" id="year" value="<?= $vehicle['year'] ?>">

            <label for="fuel_type">Type de carburant :</label>
            <input type="text" id="fuel_type" name="fuel_type" value="<?= $vehicle['fuel_type'] ?>">

            <label for="gearbox">Boîte de vitesses :</label>
            <input type="text" id="gearbox" name="gearbox" value="<?= $vehicle['gearbox'] ?>">

            <label for="warranty">Garantie :</label>
            <input type="radio" id="warranty" name="warranty" value="1" required> Oui
            <input type="radio" id="warranty" name="warranty" value="0" required> Non

            <label for="price">Prix:</label>
            <input type="number" name="price" id="price" value="<?= $vehicle['price'] ?>">

            <label for="finish">Finition :</label>
            <input type="text" id="finish" name="finish" value="<?= $vehicle['finish'] ?>">

            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" value="<?= $vehicle['location'] ?>">

            <label for="dept">Département :</label>
            <input type="text" id="dept" name="dept" value="<?= $vehicle['dept'] ?>">

            <label for="pictures">Images actuelles:</label>
            <div>
                <?php
                $pictures = explode(',', $vehicle['pictures']);
                foreach ($pictures as $picture) {
                    echo "<img src='$picture' style='max-width: 100px;'>";
                }
                ?>
            </div>
            <label for="new_pictures">Modifier les images:</label>
            <input type="file" name="new_pictures[]" id="new_pictures" multiple>

            <!-- WE CAN ADD OTHER HERE -->

            <button class="btninscription" type="submit" name="update_vehicle">Modifier</button>
        </fieldset>
    </form>
</section>