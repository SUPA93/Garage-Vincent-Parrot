
<?php

$main_menu = [
    "index.php" =>            ["title" => "ACCUEIL",            "head_title"  => "Accueil",            "meta_description" => "Garage Vincent Parrot"],
    "occasions.php" =>        ["title" => "OCCASIONS",          "head_title"  => "Nos Occasions",      "meta_description" => "Véhicules vérifiés remis en état et garantis!","path" => "/templates/occasions.php"],
    "prestations.php" =>      ["title" => "SERVICES",           "head_title"  => "Nos Services",       "meta_description" => "Découvrez nos services",                       "path" => "/templates/prestations.php"],
    "garages.php" =>          ["title" => "GARAGES",            "head_title"  => "Nos Garages ",       "meta_description" => "Nos Garages près de chez vous",                "path" => "/templates/garages.php"],
    "contactUs.php" =>        ["title" => "CONTACT",            "head_title"  => "Contact",            "meta_description" => "N'hésitez pas à nous solliciter",              "path" => "/templates/contactUs.php"],
    "connexion.php" =>        ["title" => "CONNEXION",          "head_title"  => "Connectez-vous",     "meta_description" => "Portail d'accès aux services",                 "path" => "/templates/connexion.php", "exclude" => true],
    "occasions_partial.php" =>["title" => "DÉTAILS",            "head_title"  => "Détails du véhicule","meta_description" => "Votre véhicule d'occasion plus en détail",     "path" => "/templates/occasions_partial.php", "exclude" => true],
    "subscribe.php" =>        ["title" => "INSCRIPTION",        "head_title"  => "Insciption",         "meta_description" => "Portail d'inscription nouveau client", "exclude" => true],
    "devis.php" =>            ["title" => "VOTRE DEVIS",        "head_title"  => "Devis en ligne",     "meta_description" => "un devis en ligne adapté et garanti",          "path" => "/templates/devis.php", "exclude" => true],
    "admin.php" =>            ["title" => "GESTION",            "head_title"  => "Interface",          "meta_description" => "interface d'admnistration",                    "path" => "/templates/admin.php", "exclude" => true],
    "adminAddCar.php" =>      ["title" => "Gérer les annonces", "head_title"  => "gérer les annonces", "meta_description" => "gestion des véhicules d'occasion",             "path" => "/templates/adminAddCar.php", "exclude" => true],
    "adminEditCar_form.php" =>["title" => "Modifier une annonce","head_title" => "Modifier une annonce","meta_description"=> "modification d'un véhicule",                   "path" => "/templates/adminEditCar.php", "exclude" => true],
    "occasionContact_form.php" =>["title" => "Contactez-nous","head_title" => "Ce véhicule m'interresse","meta_description"=> "contact pour ce véhicule",                    "path" => "/templates/occasionContact_form.php", "exclude" => true],
    "carsFilter.php" =>       ["title" => "filtrer les annonces","head_title" => "filtrer les annonces","meta_description"=> "filter les annonces",                          "path"=>"/lib/carsFilter.php", "exclude" => true]
];

?>
