<!-- ADMIN USED CAR ADD FORM -->
<form method="post" action="../lib/cars.php" id="add_used_form" enctype="multipart/form-data">
    <button type="button" title="Retour administration" class="btninscription">
        <a href="admin.php">Retour</a>
    </button>
    <fieldset id="gestion_used">

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

        <label for="location">Emplacement :</label>
        <input type="text" id="location" name="location" required>

        <label for="dept">Département :</label>
        <input type="text" id="dept" name="dept" required>

        <label for="pictures">Ajouter des photos (max 5) :</label>
        <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple>

        <div class="form_selector">
            <button class="btninscription" type="submit" name="add_vehicle">Ajouter</button>
        </div>
    </fieldset>
</form>