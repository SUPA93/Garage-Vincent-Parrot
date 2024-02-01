
<?php

/* error_reporting(E_ALL);
ini_set('display_errors', 1); */



// Informations  base de données
//EN LIGNE

/* $dbHost = "localhost";
$dbName = "mfkrffbm_vparrot";
$dbUser = "mfkrffbm_adminadmin";
$dbPassword = "Bilallauis93350@"; */
//EN LOCAL
$dbHost = "localhost";
$dbName = "vparrot";
$dbUser = "root";
$dbPassword = "";
try {
    // connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
};
?>
