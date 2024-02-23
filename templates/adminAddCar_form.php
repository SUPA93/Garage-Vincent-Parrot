<?php include_once "../lib/cars.php";
include_once "../lib/locations.php";
$fuelTypes = getFuelTypes($pdo);
?>
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

        <select id="fuel_type_id" name="fuel_type_id" required>
            <option value="">Sélectionnez un type de carburant</option>
            <?php foreach ($fuelTypes as $type) : ?>
                <option value="<?php echo htmlspecialchars($type['id']); ?>">
                    <?php echo htmlspecialchars($type['type']); ?>
                </option>
            <?php endforeach; ?>
        </select>

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
        <select id="location" name="location" onchange="updateDeptNumber()" required>
            <option value="">Sélectionnez un département</option>
            <?php foreach ($departements as $nom => $numero) : ?>
                <option data-deptnum="<?php echo htmlspecialchars($numero); ?>" value="<?php echo htmlspecialchars($nom); ?>">
                    <?php echo htmlspecialchars($nom); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <!-- Champ caché pour le numéro du département -->
        <input type="hidden" id="dept" name="dept">

        <label for="pictures">Ajouter une photo :</label>
        <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple>

        <div class="form_selector">
            <button class="btninscription" type="submit" name="add_vehicle">Ajouter</button>
        </div>
    </fieldset>
</form>
<script>
    function updateDeptNumber() {
        var locationSelect = document.getElementById('location');
        var selectedOption = locationSelect.options[locationSelect.selectedIndex];
        var deptNumber = selectedOption.getAttribute('data-deptnum');
        console.log("data-deptum");
        document.getElementById('dept').value = deptNumber;
        console.log(dept);
    }
</script>