<?php 
function connectToDatabase() {
    require 'config.php'; 

    try {
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    } 
}
