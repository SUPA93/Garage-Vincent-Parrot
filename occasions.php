<?php
$articles = [/*Titre de fiche           Marque                  Modèle               Année               Couleur             kilomètrages            finition/version                    photos*/
    ["title" => "Peugeot 5008",  "marque" => "Peugeot",    "modèle" => "5008",    "année" => "2022",  "couleur" => "Perle",   "kilomètres" => "12800",  "finition/version" => "black pack", "image" => "occasions/5008_1.PNG"],
    ["title" => "Fiat 500",      "marque" => "Fiat",       "modèle" => "500",     "année" => "2018",  "couleur" => "Rouge",   "kilomètres" => "12800",  "finition/version" => "",           "image" => "occasions/500_1.jpg"],
    ["title" => "Opel ",         "marque" => "Opel",       "modèle" => "Corsa",   "année" => "2017",  "couleur" => "Gris",    "kilomètres" => "12800",  "finition/version" => "ecoflex",    "image" => "occasions/opel_1.PNG"],
    ["title" => "Peugeot 2008",  "marque" => "Peugeot",    "modèle" => "2008",    "année" => "2019",  "couleur" => "Noire",   "kilomètres" => "12800",  "finition/version" => "style",      "image" => "occasions/2008.jpg"],
    ["title" => "Seat Leon",     "marque" => "Seat",       "modèle" => "Leon",    "année" => "2017",  "couleur" => "Gris",    "kilomètres" => "12800",  "finition/version" => "fr",         "image" => "occasions/LEON.jpg"],
    ["title" => "Nissan",        "marque" => "Nissan",     "modèle" => "Qashqaï", "année" => "2021",  "couleur" => "Marron",  "kilomètres" => "12800",  "finition/version" => "",           "image" => "occasions/nissan.jpg"],
    ["title" => "Citroen C3",    "marque" => "Citroën",    "modèle" => "C3",      "année" => "2022",  "couleur" => "Gris",    "kilomètres" => "12800",  "finition/version" => "city",       "image" => "occasions/C3.jpg"],
    ["title" => "Seat Cupra",    "marque" => "Seat",       "modèle" => "Cupra",   "année" => "2020",  "couleur" => "Noire",   "kilomètres" => "12800",  "finition/version" => "R",          "image" => "occasions/cupra.jpg"],
    ["title" => "Dacia",         "marque" => "Dacia",      "modèle" => "Sandero", "année" => "2022",  "couleur" => "Rouge",   "kilomètres" => "12800",  "finition/version" => "",           "image" => "occasions/dacia.jpg"],
    ["title" => "Citroen DS",    "marque" => "Citroën DS", "modèle" => "DS9",     "année" => "2022",  "couleur" => "Gris",    "kilomètres" => "12800",  "finition/version" => "",           "image" => "occasions/ds9.jpg"],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>OCASSIONS</title>
</head>

<body>
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
</body>

</html>