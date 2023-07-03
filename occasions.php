<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/templates/header.php";
?>
<section class="container">
    <h1>L'occasion</h1>
    <h2>Nos véhicules d'occasion sont vérifiés & remis en état par nos soins
    </h2>
    <div class="grid-container">
        <?php foreach ($articles as $key => $article) { ?>
            <div class="grid-item">
                <img src="<?= $article["image"] ?>" alt="Peugeot 5008">
                <h3><?= $article["title"] ?></h3>
                <p>Marque: <?= $article["marque"] ?></p>
                <p>Modèle: <?= $article["modèle"] ?></p>
                <p>Année: <?= $article["année"] ?></p>
                <p>Couleur: <?= $article["couleur"] ?></p>
                <p>Kilomètrage: <?= $article["kilomètres"] ?>km</p>
                <p>Version/finition: <?= $article["finition/version"] ?></p>

                <button type="submit" title="cliquez pour voir plus de détails">Plus de détails</button>
            </div>
        <?php } ?>
    </div>
</section>
<script src="code.js" type="module"></script>


<?php require_once __DIR__ . "/templates/footer.php"; ?>