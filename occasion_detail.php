<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/templates/header.php";

/* $id= $_GET['id']; */
$article = $articles[0];
?>
<section class="container">
    <div class="grid-item">
    <h1><?= $article["title"] ?></h1>
    <h2><?= $article["modèle"] ?>
    </h2>
    <div>
        <img src="<?= $article["image"] ?>" alt="Peugeot 5008">
        <?php /* foreach ($articles as $key => $article) {
            require __DIR__ . "/templates/occasions_part.php";
        } */ ?>
    </div>
    </div>
</section>
<script src="code.js" type="module"></script>


<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>