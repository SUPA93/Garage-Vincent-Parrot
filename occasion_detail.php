<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/templates/header.php";

$error = false;
if (isset($_GET['id'])) {
    $id = $_GET["id"];


    $article = getArticleById($articles, $id);


    if (!$article) {
        $error = true;
    }
} else {
    $error = true;
}
?>

<?php if (!$error) { ?>

    <section class="container">
        <div class="grid-item">
            <h1><?= $article["title"] ?></h1>
            <img src="<?= $article["image"] ?>" alt="<?= $article["Marque: "] . " " . $article["Modèle: "] ?>" title="<?= $article["Marque: "] . " " . $article["Modèle: "] ?>">
            <p><?php foreach ($article as $key => $detail) {
                    echo $key . "   " . $detail . '<br>'; // Avec insertion d'un espace entre 2 valeurs
                } ?></p>
        </div>
    </section>
<?php } else { ?>
    <h4 class="article3">Article inconnu</h4>

<?php } ?>
<script src="code.js" type="module"></script>


<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>