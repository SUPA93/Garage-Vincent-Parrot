<?php
require __DIR__ . "/templates/header.php";

?>
<section class="inscription">
    <h1>Gestion des annonces</h1>
    <div class="navigation_admin">
        <button type="button" title="Retour administration" class="btninscription">
            <a href="admin.php">Retour</a>
        </button>

    </div>
    <form method="post" action="occasions_handler.php" id="add_used_form" enctype="multipart/form-data">
        <fieldset id="gestion_used">
            <input type="hidden" name="my_form_occasion" value="form_occasion_handler">
            <h2>Ajouter un véhicule</h2>

            <label for="brand">Marque :</label>
            <input type="text" id="brand" name="brand" required>

            <label for="model">Modèle :</label>
            <input type="text" id="model" name="model" required>

            <label for="color">Couleur :</label>
            <input type="text" id="color" name="color" required>

            <label for="mileage">Kilométrage :</label>
            <input type="number" id="mileage" name="mileage" required>

            <label for="year">Année :</label>
            <input type="number" id="year" name="year" required>

            <label for="fuel_type">Type de carburant :</label>
            <input type="text" id="fuel_type" name="fuel_type" required>

            <label for="gearbox">Boîte de vitesses :</label>
            <input type="text" id="gearbox" name="gearbox" required>

            <label for="warranty">Garantie :</label>
            <input type="radio" id="warranty" name="warranty" value="1" required> Oui
            <input type="radio" id="warranty" name="warranty" value="0" required> Non

            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" required>

            <label for="finish">Finition :</label>
            <input type="text" id="finish" name="finish" required>

            <label for="pictures">Ajouter une photo :</label>
            <input type="file" id="pictures" name="pictures[]" accept="image/*">

            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" required>

            <label for="dept">Département :</label>
            <input type="text" id="dept" name="dept" required>
            <div class="form_selector">
                <button class="btninscription" type="submit" id="add">Ajouter</button>
            </div>
        </fieldset>
    </form>
</section>
<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>