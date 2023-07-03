<?php
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/templates/header.php";
?>
<section class="container">
    <h1>L'occasion</h1>
    <h2>Nos véhicules d'occasion sont vérifiés & remis en état par nos soins
    </h2>
    <div class="grid-container">
        <?php foreach ($articles as $key => $article) {
            require __DIR__ . "/templates/occasions_part.php";
        } ?>
    </div>
</section>
<script src="code.js" type="module"></script>


<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/templates/footer.php";
?>