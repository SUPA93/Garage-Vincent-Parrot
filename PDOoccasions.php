<?php
include_once __DIR__ . '/config/config.php';

$article = [];

$error = false;

//  requête SQL pour récupérer les données
try {
    $sql = "SELECT * FROM used_vehicules";
    $stmt = $pdo->query($sql);

    // résultats stockes dans un tableau
    $articles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $articles[] = $row;
    }
    if (isset($_GET['id'])) {
        $id = $_GET["id"];

        // Cherchez le véhicule avec l'ID spécifié
        foreach ($articles as $item) {
            if ($item['id'] == $id) {
                $article = $item;
                break;
            }
        }

        if (empty($article)) {
            $error = true;
        }
    } else {
        $error = true;
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données : " . $e->getMessage();
    $error = true;
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gestion de l'ajout
    if (isset($_POST['add'])) {
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

            // Vérifie si des fichiers ont été téléchargés
            $defaultImage = 'assets/images/default_cars.png';
            $uploadedImages = [];
            if (isset($_FILES['pictures'])) {
                $uploadedFiles = $_FILES['pictures'];

                foreach ($uploadedFiles['tmp_name'] as $key => $tmpName) {
                    if ($uploadedFiles['error'][$key] == UPLOAD_ERR_OK) {
                        $originalName = basename($uploadedFiles['name'][$key]);
                        $uniqueFileName = time() . '_' . $originalName;
                        $destination = 'occasions/' . $uniqueFileName;

                        if (move_uploaded_file($tmpName, $destination)) {
                            // Le fichier a été téléchargé avec succès, ajoutez le chemin relatif à la liste des images téléchargées
                            $uploadedImages[] = $destination;
                        }
                    }
                }
            }

            // Utilisez l'image par défaut si aucune image n'a été téléchargée
            if (empty($uploadedImages)) {
                $uploadedImages[] = $defaultImage;
            }

            // Insérer les données dans la table avec les chemins d'image
            $sql = "INSERT INTO used_vehicules (brand, model, color, mileage, year, fuel_type, gearbox, warranty, price, finish, location, dept, pictures)
                    VALUES (:brand, :model, :color, :mileage, :year, :fuel_type, :gearbox, :warranty, :price, :finish, :location, :dept, :pictures)";
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
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':dept', $dept);
            $stmt->bindParam(':pictures', $imagesString);

            $stmt->execute();
            //redirection
            header("Location: occasions_handler.php");
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout des données : " . $e->getMessage();
            $error = true;
        }
    }
}

