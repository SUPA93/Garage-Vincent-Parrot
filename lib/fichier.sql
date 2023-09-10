DATABASE initialisation;

CREATE DATABASE vparrot;

USE vparrot_bdd;

--table a creér pour les meta données et le header.

/* $main_menu = [
 ["page" => "index.php", "title" => "Accueil", "meta_description"=> "Garage Vincent Parrot"],
 ["page" => "prestations.php", "title" => "Services", "meta_description"=> "Découvrez nos services"],
 ["page" => "garages.php", "title" => "Garages", "meta_description"=> "Nos Garages près de chez vous"],
 ["page" => "occasions.php", "title" => "Occasions", "meta_description"=> "Véhicules vérifiés remis en état et garantis!"],
 ["page" => "connexion.php", "title" => "Connexion", "meta_description"=> "Portail d'accès aux services"],
 ["page" => "contact.php", "title" => "Contactez-nous", "meta_description"=> "N'hésitez pas à nous solliciter"],
 ["page" => "occasion_detail.php", "title" => "Détails", "meta_description"=> "Votre véhicule d'occasion plus en détail"],
 ["page" => "subscribe.php", "title" => "Inscription", "meta_description"=> "Portail d'inscription nouveau client"],
 ] */

/* CREATE TABLE utilisateurs_parrot (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);
 */
/*  CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    civilite ENUM('Mr', 'Mme') NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    ville VARCHAR(255),
    code_postal VARCHAR(10),
    adresse TEXT,
    newsletter TINYINT(1) DEFAULT 0
);
 */