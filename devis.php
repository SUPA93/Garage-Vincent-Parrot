<?php require_once __DIR__ . "/templates/header.php"; ?>


<h1 class="inscription">Votre Devis en ligne</h1>

<style type="text/css">
    .tftable {
        color: #333333;
        width: 50%;
        border-width: 2px;
        border-color: red;
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
        font-weight: bold;
    }

    .tftable th {
        font-size: 20px;
        background-color: #838383;
        padding: 8px;
        text-align: center;
    }

    .tftable tr {
        background-color: #959595;
    }

    .tftable td {
        font-size: 15px;
        border-width: 2px;
        border-style: solid;
        border-color: #ffffff;
        font-weight: bolder;
        text-align: center;
        padding: 20px;
        white-space: nowrap;
    }

    .tftable tr:hover {
        background-color: #ffffff;
    }
</style>
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


<?php require_once __DIR__ . "/templates/footer.php"; ?>