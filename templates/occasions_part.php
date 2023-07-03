<?php /*grille de véhicules d'occasion avec la boucle en php*/ ?>
<div class="grid-item">
    <img src="<?= $article["image"] ?>" alt="<?= $article["Marque: "]." ". $article["Modèle: "] ?>" title="<?= $article["Marque: "]." ". $article["Modèle: "] ?>">
    <h3><?= $article["title"] ?></h3>
    <p>Marque: <?= $article["Marque: "] ?></p>
    <p>Modèle: <?= $article["Modèle: "] ?></p>
    <p>Année: <?= $article["Année: "] ?></p>
    <p>Couleur: <?= $article["Couleur: "] ?></p>
    <p>Kilomètrage: <?= $article["Kilomètres: "] ?>km</p>
    <p>Version/finition: <?= $article["Finition/version: "] ?></p>
    <button type="button" title="cliquez pour voir plus de détails"class="btninscription">
        <a href="occasion_detail.php?id=<?=$key;?>">Plus de détails</a>
    </button>
</div>