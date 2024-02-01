<?php
require_once "../lib/config.php";
require_once "../lib/pdo.php";
require_once "../lib/cars.php";
require_once "../lib/contact.php";
require_once __DIR__ . "/header.php";
?>
<section class="inscription">
    <?php
    $vehicleId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $vehicle = getVehicleById($pdo, $vehicleId);
    if ($vehicleId > 0) {
        $vehicle = getVehicleById($pdo, $vehicleId);
        if (!$vehicle) {
            echo "<p>Véhicule non trouvé.</p>";
        }
    } else {
        echo "<p>ID de véhicule invalide.</p>";
    }

    // Affichage des informations du véhicule
    echo "<h1>Contact pour " . htmlspecialchars($vehicle['brand']) . ' ' . htmlspecialchars($vehicle['model']) . "</h1>";

    // Formulaire de contact
    ?>
    <form method="post" style="padding: 20px; color: black; text-shadow: 0px 0px 3px white;">
        <fieldset style="background-image: url('<?= $vehicle["pictures"] ?>'); background-size: cover; opacity: 1; border: 2px solid black; background-position: center;">
            <input type="hidden" name="vehicle_id" value="<?= $vehicleId ?>">
            <input type="hidden" name="vehicle_brand" value="<?= $vehicle['brand'] ?>">
            <input type="hidden" name="vehicle_model" value="<?= $vehicle['model'] ?>">
            <p id="carsDetails">
                Année : <?= htmlspecialchars($vehicle['year']) . "<br>" . " Kilomètrage : " .  htmlspecialchars($vehicle['mileage']) . " km" ?>
            </p>
            <label for="nom">Nom</label>
            <input type="text" name="nom" placeholder="Votre nom" required autocomplete="family-name">
            
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="ex: courriel@fr" required autocomplete="email">
            
            <label for="message">Votre message</label>
            <textarea name="message" placeholder="à propos du véhicule..." required></textarea>
            
            <button class="btninscription" name="occasion_contact_form" type="submit" >Envoyer</button>
            <p><button class="btninscription"  id="btnRetour"><a href="occasions_partial.php?id=<?= $vehicleId ?>">❌Retour</a></button></p>
        </fieldset>
    </form>
</section>
<?php
require_once __DIR__ . "/footer.php";
?>