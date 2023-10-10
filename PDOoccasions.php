<?php

require_once __DIR__ . "/config/config.php";

// tableau vide
$article = [];
//gestion d'erreur false par défaut
$error = false;

//  récupérer les données
try {
    $sql = "SELECT * FROM used_vehicules";
    $stmt = $pdo->query($sql);

    // tableau
    $articles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $articles[] = $row;
    }
    if (isset($_GET['id'])) {
        $id = $_GET["id"];

        // véhicule par ID 
        foreach ($articles as $item) {
            if ($item['id'] == $id) {
                $article = $item;
                break;
            }
        }
        // si le véhicule n'est pas
        if (empty($article)) {
            $error = true;
        }
    } else {
        $error = true;
    }
} catch (PDOException $e) {
    echo "Cette annonce n'existe pas " . $e->getMessage();
    $error = true;
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['my_form_occasion']) && $_POST['my_form_occasion'] === 'form_occasion_handler') {
        try {
            // Récupération des données du formulaire
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $color = $_POST['color'];
            $mileage = $_POST['mileage'];
            $year = $_POST['year'];
            $fuel_type = $_POST['fuel_type'];
            $gearbox = $_POST['gearbox'];
            $warranty = $_POST['warranty'];
            $price = $_POST['price'];
            $finish = $_POST['finish'];
            $location = $_POST['location'];
            $dept = $_POST['dept'];
            $ads_date = date("Y-m-d");

            // image par défaut
            $defaultImage = 'assets/images/default_cars.png';

            // Vérifier si des fichiers ont été téléchargés et vérification du nombre d'images.
            $uploadedImages = [];
            if (isset($_FILES['pictures']) && count($_FILES['pictures']['tmp_name']) <= 5) {
                $pictures = $_FILES['pictures'];

                foreach ($pictures['tmp_name'] as $key => $tmpName) {
                    if ($pictures['error'][$key] == UPLOAD_ERR_OK) {
                        $originalName = basename($pictures['name'][$key]);
                        $uniqueFileName = time() . '_' . $originalName;
                        $destination = './occasions/' . $uniqueFileName;

                        if (move_uploaded_file($tmpName, $destination)) {
                            // Le fichier a été téléchargé avec succès
                            $uploadedImages[] = $destination;
                        }
                    }
                }
            } else {
                echo "Vous ne pouvez ajouter que 5 images maximum.";
                exit;
            }
            // Construisez une chaîne de chemins d'images séparés par des virgules
            $imagesString = !empty($uploadedImages) ? implode(',', $uploadedImages) : $defaultImage;
            // Requête d'insertion dans la base de données
            $sql = "INSERT INTO used_vehicules (brand, model, color, mileage, year, fuel_type, gearbox, warranty, price, finish, pictures, location, dept, ads_date)
                    VALUES (:brand, :model, :color, :mileage, :year, :fuel_type, :gearbox, :warranty, :price, :finish, :pictures, :location, :dept, :ads_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':model', $model);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':mileage', $mileage);
            $stmt->bindParam(':year', $year);
            $stmt->bindParam(':fuel_type', $fuel_type);
            $stmt->bindParam(':gearbox', $gearbox);
            $stmt->bindParam(':warranty', $warranty);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':finish', $finish);
            $stmt->bindParam(':pictures', $imagesString);
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':dept', $dept);
            $stmt->bindParam(':ads_date', $ads_date);
            $stmt->execute();
            // Redirection après l'insertion des données
            header("Location: occasions_handler.php");
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout des données : " . $e->getMessage();
        }
    }
}
