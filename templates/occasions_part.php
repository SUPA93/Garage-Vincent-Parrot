<?php /*grille de véhicules d'occasion avec la boucle en php*/ ?>
<div class="grid-item">
    <img src="<?= $article["image"] ?>" alt="<?= $article["marque"]." ". $article["modèle"] ?>" title="<?= $article["marque"]." ". $article["modèle"] ?>">
    <h3><?= $article["title"] ?></h3>
    <p>Marque: <?= $article["marque"] ?></p>
    <p>Modèle: <?= $article["modèle"] ?></p>
    <p>Année: <?= $article["année"] ?></p>
    <p>Couleur: <?= $article["couleur"] ?></p>
    <p>Kilomètrage: <?= $article["kilomètres"] ?>km</p>
    <p>Version/finition: <?= $article["finition/version"] ?></p>
    <button type="submit" title="cliquez pour voir plus de détails">Plus de détails</button>
</div>