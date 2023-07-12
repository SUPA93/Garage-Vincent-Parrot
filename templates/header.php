<?php
$main_menu = [
    ["page" => "index.php", "title" => "ACCEUIL", "meta_description" => "Garage Vincent Parrot"],
    ["page" => "prestations.php", "title" => "SERVICES", "meta_description" => "Découvrez nos services"],
    ["page" => "garages.php", "title" => "GARAGES", "meta_description" => "Nos Garages près de chez vous"],
    ["page" => "occasions.php", "title" => "OCCASIONS", "meta_description" => "Véhicules vérifiés remis en état et garantis!"],
    ["page" => "connexion.php", "title" => "CONNEXION", "meta_description" => "Portail d'accès aux services"],
    ["page" => "contact.php", "title" => "CONTACT", "meta_description" => "N'hésitez pas à nous solliciter"],
    /* ["page" => "occasion_detail.php", "title" => "DÉTAILS", "meta_description"=> "Votre véhicule d'occasion plus en détail"],
            ["page" => "subscribe.php", "title" => "INSCRIPTION", "meta_description"=> "Portail d'inscription nouveau client"] */
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" <?php foreach ($main_menu as $key => $menu_item) { ?> content="<?php $menu_item["meta_description"]; ?>">
<?php }; ?>
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;600&display=swap" rel="stylesheet">
<?php echo '<link rel="stylesheet" href="/assets/style/style.css">'; ?>
<?php
foreach ($main_menu as $key => $menu_item) { ?>
    <title> <?= $menu_item["title"]?> lol </title>
    <?php var_dump($menu_item["title"]); ?>
<?php }; ?>
</head>

<body>
    <header><!--LOGO--------------------------------------->
        <div class="logo">
            <a href="index.php">
                <img src=../ressources/parrotimage.PNG alt="LOGO VPARROT" title="Garage Vincent Parrot">
            </a>
        </div><!--NAVBAR-->
        <nav class="navbar">
            <ul>
                <?php
                foreach ($main_menu as $key => $menu_item) { ?>
                    <li>
                        <a href="<?= $menu_item["page"]; ?>"><?= $menu_item["title"] ?></a>
                    </li>

                <?php }; ?>

                <!-- <li>
                    <a href="prestations.php">PRESTATIONS</a>
                </li>
                <li>
                    <a href="position.php">GARAGES</a>
                </li>
                <li>
                    <a href="occasions.php">OCCASIONS</a>
                </li>
                <li>
                    <a href="connexion.php">CONNECTION</a>
                </li>
                <li>
                    <a href="contact.php">CONTACT</a>
                </li> -->
            </ul>
        </nav>
    </header>
    <!--FIN DE L'ENTETE------------------------------------>
    <main>