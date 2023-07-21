<?php
$articles = [/*Titre de fiche           Marque                  Modèle               Année               Couleur             kilomètrages            finition/version                    photos*/
    ["title" => "Peugeot 5008",  "Marque: " => "Peugeot",    "Modèle: " => "5008",    "Année: " => "2022",  "Couleur: " => "Perle",   "Kilomètres: " => "29800",  "Finition/version: " => "black pack", "image" => "occasions/5008_1.PNG"],
    ["title" => "Fiat 500",      "Marque: " => "Fiat",       "Modèle: " => "500",     "Année: " => "2018",  "Couleur: " => "Rouge",   "Kilomètres: " => "12800",  "Finition/version: " => "",           "image" => "occasions/500_1.jpg"],
    ["title" => "Opel Corsa ",   "Marque: " => "Opel",       "Modèle: " => "Corsa",   "Année: " => "2017",  "Couleur: " => "Gris",    "Kilomètres: " => "17900",  "Finition/version: " => "ecoflex",    "image" => "occasions/opel_1.PNG"],
    ["title" => "Peugeot 2008",  "Marque: " => "Peugeot",    "Modèle: " => "2008",    "Année: " => "2019",  "Couleur: " => "Noire",   "Kilomètres: " => "28250",  "Finition/version: " => "style",      "image" => "occasions/2008.jpg"],
    ["title" => "Seat Leon",     "Marque: " => "Seat",       "Modèle: " => "Leon",    "Année: " => "2017",  "Couleur: " => "Gris",    "Kilomètres: " => "18000",  "Finition/version: " => "fr",         "image" => "occasions/LEON.jpg"],
    ["title" => "Nissan",        "Marque: " => "Nissan",     "Modèle: " => "Qashqaï", "Année: " => "2021",  "Couleur: " => "Marron",  "Kilomètres: " => "1280" ,  "Finition/version: " => "",           "image" => "occasions/nissan.jpg"],
    ["title" => "Citroen C3",    "Marque: " => "Citroën",    "Modèle: " => "C3",      "Année: " => "2022",  "Couleur: " => "Gris",    "Kilomètres: " => "12800",  "Finition/version: " => "city",       "image" => "occasions/C3.jpg"],
    ["title" => "Seat Cupra",    "Marque: " => "Seat",       "Modèle: " => "Cupra",   "Année: " => "2020",  "Couleur: " => "Noire",   "Kilomètres: " => "12800",  "Finition/version: " => "R",          "image" => "occasions/cupra.jpg"],
    ["title" => "Dacia",         "Marque: " => "Dacia",      "Modèle: " => "Sandero", "Année: " => "2022",  "Couleur: " => "Rouge",   "Kilomètres: " => "12800",  "Finition/version: " => "",           "image" => "occasions/dacia.jpg"],
    ["title" => "Citroen DS",    "Marque: " => "Citroën DS", "Modèle: " => "DS9",     "Année: " => "2022",  "Couleur: " => "Gris",    "Kilomètres: " => "12800",  "Finition/version: " => "",           "image" => "occasions/ds9.jpg"],
];



function getArticleById(array $articles,int $id) {
    if(isset($articles[$id])) {
        return $articles[$id];
    } 
    return false;}
?>