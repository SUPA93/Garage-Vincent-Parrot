<?php

/* error_reporting(E_ALL);
ini_set('display_errors', 1); */


// Informations de connexion à la base de données
$dbHost = "localhost";
$dbName = "vparrot";
$dbUser = "root";
$dbPassword = "";

try {
    // Établir la connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
};
