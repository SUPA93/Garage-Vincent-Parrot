<?php

require_once __DIR__ . "/templates/header.php";
?>

<section class="container">
    <h1>L'occasion</h1>
    <h2>Nos véhicules d'occasion sont vérifiés & remis en état par nos soins</h2>
    <form id="filterForm" class="inscription">
        <label for="sortBy">Trier par :</label>
        <select id="sortBy" name="sortBy">
            <option value="year-asc">Année croissante</option>
            <option value="year-desc">Année décroissante</option>
            <option value="mileage-asc">Kilométrage croissant</option>
            <option value="mileage-desc">Kilométrage décroissant</option>
            <option value="price-asc">Prix croissant</option>
            <option value="price-desc">Prix décroissant</option>
        </select>

        <button type="submit" class="inscription" name="filet_btn">Filtrer</button>
    </form>
    <div class="grid-container">
        <?php foreach ($articles as $key => $article) { ?>
            <div class="grid-item">
                <img src="<?php echo $article['pictures']; ?>" alt="Image du véhicule">
                <h3><?php echo $article['brand'] . ' ' . $article['model']; ?></h3>
                <p>Année : <?php echo $article['year']; ?></p>
                <p>Kilométrage : <?php echo $article['mileage']; ?> km</p>
                <p>Energie : <?php echo $article['fuel_type']; ?></p>
                <p>Couleur : <?php echo $article['color']; ?></p>
                <p>Boite de vitesse : <?php echo $article['gearbox']; ?></p>

                <button type="submit" class="btninscription">
                    <a href="occasion_detail.php?id=<?= $article['id'] ?>" title="Cliquez pour voir plus de détails">Plus de détails</a>
                </button>
            </div>
        <?php } ?>
    </div>
</section>

<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>