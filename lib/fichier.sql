-- Active: 1694362200871@@127.0.0.1@3306@vparrot

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

/* CREATE TABLE utilisateurs (
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
 ); */

/* CREATE TABLE used_vehicles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(255),
    model VARCHAR(255),
    color VARCHAR(255),
    mileage INT,
    year INT,
    fuel_type VARCHAR(255),
    gearbox VARCHAR(255),
    warranty BOOLEAN,
    price DECIMAL(10, 2),
    finish VARCHAR(255),
    pictures TEXT,
    location VARCHAR(255),
    dept VARCHAR(255),
    ads_date DATE
); */

/* CREATE TABLE formulaire_contact (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    statut ENUM('particulier', 'professionnel') NOT NULL,
    societe VARCHAR(255),
    objet VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    adress VARCHAR(255),
    fichier VARCHAR(255),
    message TEXT NOT NULL,
    date_submission TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); */



-- Insérer le premier contact form message--
/* INSERT INTO formulaire_contact (nom, prenom, statut, societe, objet, email, adress, fichier, message)
VALUES ('Doe', 'John', 'particulier', 'XYZ Inc', 'Demande dinformation', 'john.doe@example.com', '123 Rue de la Rue', 'fichier1.pdf', 'Merci de me donner plus dinformations.'); */

-- Insérer le second contact form message --
/*INSERT INTO formulaire_contact (nom, prenom, statut, societe, objet, email, adress, fichier, message)VALUES
    -> ('Potter', 'Harry', 'particulier', 'XYZ', 'report_bug', 'Harrygrandh@exemple.com', 'voie 9 un quart', 'pdf1.pdf', 'Windgardium leviossa');*/
/* 
CREATE TABLE horaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jour_semaine VARCHAR(10) NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL
);
INSERT INTO horaires (jour_semaine, heure_ouverture, heure_fermeture)
VALUES
    ('Lundi', '09:00:00', '18:00:00'),
    ('Mardi', '09:00:00', '18:00:00'),
    ('Mercredi', '09:00:00', '18:00:00'),
    ('Jeudi', '09:00:00', '18:00:00'),
    ('Vendredi', '09:00:00', '18:00:00'),
    ('Samedi', '9:00:00', '13:00:00'); */
