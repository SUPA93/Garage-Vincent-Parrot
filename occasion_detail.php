<?php

require_once __DIR__ . "/templates/header.php";

?>

<section class="container">
    <h1><?= $article['brand'] . ' ' . $article['model']; ?></h1>
    <?php if (!$error) { ?>
        <div class="grid-item">
            <img src="<?= $article["pictures"] ?>" alt="<?= $article["brand"] . " " . $article["model"] ?>" title="<?= $article["brand"] . " " . $article["model"] ?>">
            <p>Année : <?= $article['year']; ?></p>
            <p>Kilométrage compteur: <?= $article['mileage']; ?> km</p>
            <p>Energie : <?= $article['fuel_type']; ?></p>
            <p>Boite de vitesse : <?= $article['gearbox']; ?></p>
            <p>Couleur : <?= $article['color']; ?></p>
            <p>Garantie: <?php echo $article['warranty'] ? 'Oui' : 'Non'; ?></p>
            <p>Localisation: <?php echo $article['dept'];?></p>
            <!-- Bouton de retour à la liste de résultats -->
            <button type="button" title="Retour à la liste" class="btninscription">
                <a href="occasions.php">Retour aux occasions</a>
            </button>
        </div>
    <?php } else { ?>
        <h4 class="article3">Article inconnu</h4>
        <button type="button" title="Retour à la liste" class="btninscription">
            <a href="occasions.php">Retour aux occasions</a>
        </button>
    <?php } ?>
</section>

<?php require_once __DIR__ . "/templates/footer.php"; ?>