<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/templates/header.php";


// GESTION DU CAS D'ERREUR 
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
if (!$error) { ?>
    <section class="container">
        <h1>L'occasion</h1>
        <div class="grid-item">
            <h1><?= $article["title"] ?></h1>
            <img src="<?= $article["image"] ?>" alt="<?= $article["Marque: "] . " " . $article["Modèle: "] ?>" title="<?= $article["Marque: "] . " " . $article["Modèle: "] ?>">
            <p><?php foreach ($article as $key => $detail) {
                    echo $key . "   " . $detail . '<br>'; // Avec insertion d'un saut de ligne entre 2 valeurs
                } ?></p>
            <!-- Bouton de retour à la liste de résultats -->
            <button type="button" title="Retour à la liste" class="btninscription">
                <a href="occasions.php">Retour aux occasions</a>
            </button>
        </div>
    </section>
<?php } else { ?>
    <h4 class="article3">Article inconnu</h4>

<?php } ?>
<script src="code.js" type="module"></script>

<?php require_once __DIR__ . "/templates/footer.php"; ?>