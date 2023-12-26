<?php
require_once "../lib/config.php";
require_once "../lib/pdo.php";
require_once "../lib/cars.php";
require_once __DIR__ . "/header.php";

$vehicleId = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<section class="container">
    <h1>Votre véhicule en détail</h1>
    <button type="button" title="Occasions" class="btninscription">
        <a href="occasions.php">Retour aux occasions</a>
    </button>
    <button type="button" title="contactez-nous" class="btninscription">
        
        <a href="occasionContact_form.php?id=<?= $vehicleId ?>">Demandez-nous !</a>
    </button>
    <?php
    if ($vehicleId) {
        echo displayVehicleDetails($pdo, $vehicleId);
    } else {
        echo "<p>ID de véhicule invalide.</p>";
    }
    ?>

</section>
<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/footer.php";
?>