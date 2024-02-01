<!-- ESTIMATE SERVICE COST PAGE -->
<?php
require_once  "../lib/config.php";
require_once "../lib/pdo.php";
require_once  "../lib/service.php";

require_once __DIR__ . "/header.php";
?>

<h1 class="inscription">Votre Devis en ligne</h1>

<button type="button" title="Retour aux services" class="btninscription">
    <a href="../index.php">Retour aux services</a>
</button>
<table class="tftable" border="1">
    <tr>
        <th>Article</th>
        <th>Quantité</th>
        <th>Tarif</th>
    </tr>
    <?php if (!empty($selectedService)) : ?>
        <tr>
            <td><?= $selectedService['svc_name'] ?></td>
            <td>1</td>
            <td><?= $selectedService['svc_price'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>TOTAL</td>
            <td><?= $selectedService['svc_price'] ?></td>
        </tr>
    <?php endif; ?>
</table>
<h2 class="inscription" style="margin-bottom: 1000px;">Tous nos prix sont affichés TTC la TVA est déja appliquée</h2>


<?php require_once __DIR__ . "/footer.php"; ?>