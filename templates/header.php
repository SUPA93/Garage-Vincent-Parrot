<?php
require_once __DIR__ . "/../lib/menu.php";

// RÉCUPERATION DU NOM DE SCRIPT SUIVANT LA PAGE EN COURS
$currentPage = htmlentities(basename($_SERVER["SCRIPT_NAME"]));

// MODIFICATION POUR LA PAGE DE VISUALISATION DES DEVIS 
if ($currentPage === "devis.php") {
    $main_menu = $main_menu_2;
/* } elseif ($currentPage === "subscribe.php") {
    $main_menu = $main_menu_2; */
} else {
    $main_menu[$currentPage]["head_title"];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $main_menu[$currentPage]["meta_description"] ?>">
    <!------------------------------------------SI ON VEUT UTILISER BOOTSTRAP  ------------>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;600&display=swap" rel="stylesheet">-->
    <?php echo '<link rel="stylesheet" href="/assets/style/style.css">'; ?>
    <title> <?= $main_menu[$currentPage]["head_title"] ?></title>
    
</head>

<body>
    <header><!--LOGO--------------------------------------->
        <div class="logo">
            <a href="../index.php">
                <img src=../ressources/parrotimage.PNG alt="LOGO VPARROT" title="Garage Vincent Parrot">
            </a>
        </div><!--NAVBAR-->
        <nav id="nav">
            <p></p>
            <ul>
                <?php
                foreach ($main_menu as $key => $menu_item) {
                    if (!array_key_exists("exclude", $menu_item)){ ?>
                    <li class="<?php if ($key === $currentPage) {
                                    echo "active";
                                } ?>">
                        <a href="<?= $key; ?>"><?= $menu_item["title"] ?></a>
                    </li>
                    <?php }
                } ?>
            </ul>
            <div id="icons"></div>
        </nav>
    </header>
    <!--FIN DE L'ENTETE------------------------------------>
    <main>