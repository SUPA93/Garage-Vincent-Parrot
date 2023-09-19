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

/* CREATE TABLE used_vehicules (
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

/* INSERT INTO used_vehicules (brand, model, color, mileage, year, fuel_type, gearbox,warranty,price,finish,pictures,location,dept)
VALUES('Peugeot','5008','blanc perle',29800,2022,'essence','automatique',TRUE,32500,'GT BLACK PACK','occasions/5008_1.PNG','ile de france','75'); */


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
/*
INSERT INTO used_vehicules (brand, model, color, mileage, year, fuel_type, gearbox, warranty, price, finish, pictures, location, dept, ads_date)
VALUES
    ('Fiat', '500', 'Rouge', FLOOR(RAND() * 20000), '2018', 'Essence', 'Automatique', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 20000, 2), '', 'occasions/500_1.jpg', 'Marseille', '13', '2023-09-16'),
    ('Opel', 'Corsa', 'Gris', FLOOR(RAND() * 25000), '2017', 'Diesel', 'Manuelle', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 25000, 2), 'ecoflex', 'occasions/opel_1.PNG', 'Lyon', '69', '2023-09-16'),
    ('Peugeot', '2008', 'Noire', FLOOR(RAND() * 40000), '2019', 'Essence', 'Automatique', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 40000, 2), 'style', 'occasions/2008.jpg', 'Paris', '75', '2023-09-16'),
    ('Seat', 'Leon', 'Gris', FLOOR(RAND() * 30000), '2017', 'Essence', 'Manuelle', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 30000, 2), 'fr', 'occasions/LEON.jpg', 'Toulouse', '31', '2023-09-16'),
    ('Nissan', 'Qashqai', 'Marron', FLOOR(RAND() * 10000), '2021', 'Essence', 'Automatique', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 20000, 2), '', 'occasions/nissan.jpg', 'Lille', '59', '2023-09-16'),
    ('Citroën', 'C3', 'Gris', FLOOR(RAND() * 30000), '2022', 'Essence', 'Manuelle', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 30000, 2), 'city', 'occasions/C3.jpg', 'Marseille', '13', '2023-09-16'),
    ('Seat', 'Cupra', 'Noire', FLOOR(RAND() * 20000), '2020', 'Essence', 'Automatique', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 20000, 2), 'R', 'occasions/cupra.jpg', 'Lyon', '69', '2023-09-16'),
    ('Dacia', 'Sandero', 'Rouge', FLOOR(RAND() * 15000), '2022', 'Essence', 'Manuelle', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 15000, 2), '', 'occasions/dacia.jpg', 'Paris', '75', '2023-09-16'),
    ('Citroën DS', 'DS9', 'Gris', FLOOR(RAND() * 10000), '2022', 'Essence', 'Automatique', CASE WHEN RAND() > 0.5 THEN TRUE ELSE FALSE END, ROUND(RAND() * 10000, 2), '', 'occasions/ds9.jpg', 'Toulouse', '31', '2023-09-16');
*/

/* CREATE TABLE horaires (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jour_semaine VARCHAR(10) NOT NULL,
    heure_ouverture TIME NOT NULL,
    heure_fermeture TIME NOT NULL
); */
/* INSERT INTO horaires (jour_semaine, heure_ouverture, heure_fermeture)
VALUES
    ('Lundi', '09:00:00', '18:00:00'),
    ('Mardi', '09:00:00', '18:00:00'),
    ('Mercredi', '09:00:00', '18:00:00'),
    ('Jeudi', '09:00:00', '18:00:00'),
    ('Vendredi', '09:00:00', '18:00:00'),
    ('Samedi', '9:00:00', '13:00:00');  */
