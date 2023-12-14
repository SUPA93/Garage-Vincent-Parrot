<!-- Cars Function script -->
<?php

include_once __DIR__ . '/pdo.php';

$pdo = connectToDatabase();
// GET USED VEHICLES FROM DATA BASE
function getUsedVehicles($pdo)
{
    try {
        $sql = "SELECT * FROM used_vehicules";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des véhicules : " . $e->getMessage();
        return [];
    }
}
// GET USED VEHICLE'S ID FROM DB
function getVehicleById($pdo, $id)
{
    if (!$id) {
        echo "ID du véhicule manquant";
        return null;
    }
    try {
        $sql = "SELECT * FROM used_vehicules WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$vehicle) {
            echo "Véhicule non trouvé";
            return null;
        }
        return $vehicle;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération du véhicule : " . $e->getMessage();
        return null;
    }
}
// DISPLAY VEHICLE DETAILS
function displayVehicleDetails($pdo, $vehicleId)
{
    $vehicle = getVehicleById($pdo, $vehicleId);
    $warrantyText = $vehicle['warranty'] ? "Oui" : "Non";
    if (!$vehicle) {
        return "<p>Véhicule non trouvé.</p>";
    }
    $output = "<div class='grid-container'>";
    $output = "<div class='grid-item'>";
    $output .= "<img src='" . htmlentities($vehicle['pictures']) . "' />";
    $output .= "<h2>" . htmlspecialchars($vehicle['brand']) . ' ' . htmlspecialchars($vehicle['model']) . "</h2>";
    $output .= "<p>" . "Marque: " . htmlspecialchars($vehicle['brand']) . "</p>";
    $output .= "<p>" . "Modèle: " . htmlspecialchars($vehicle['model']) . "</p>";
    $output .= "<p>" . "Année: " . htmlspecialchars($vehicle['year']) . "</p>";
    $output .= "<p>" . "Kilomètres: " . htmlspecialchars($vehicle['mileage']) . " km" . "</p>";
    $output .= "<p>" . "Energie: " . htmlspecialchars($vehicle['fuel_type']) . "</p>";
    $output .= "<p>" . "Prix: " . htmlspecialchars($vehicle['price']) . " €" . "</p>";
    $output .= "<p>" . "Boite: " . htmlspecialchars($vehicle['gearbox']) . "</p>";
    $output .= "<p>" . "Couleur:  " . htmlspecialchars($vehicle['color']) . "</p>";
    $output .= "<p>Garantie: " . htmlentities($warrantyText) . "</p>";
    $output .= "<p>" . "Localisation: " . htmlspecialchars($vehicle['location']) . "</p>";
    $output .= "<p>" . "Departement: " . htmlspecialchars($vehicle['dept']) . "</p>";
    $output .= "</div>";
    $output .= "</div>";

    return $output;
}

function getVehicleForEdit($pdo, $id)
{
    if (!$id) {
        echo "ID du véhicule manquant";
        exit;
    }

    $vehicle = getVehicleById($pdo, $id);

    if (!$vehicle) {
        echo "Véhicule non trouvé";
        exit;
    }

    return $vehicle;
}
// ADD VEHICLE TO DB
function insertVehicle($pdo, $data, $uploadedImages) {
    // check and clean datas
    $data['year'] = filter_var($data['year'], FILTER_VALIDATE_INT);
    $data['price'] = filter_var($data['price'], FILTER_VALIDATE_FLOAT);
    $data['mileage'] = filter_var($data['mileage'], FILTER_VALIDATE_INT);
    $data['dept'] = filter_var($data['dept'], FILTER_VALIDATE_INT);
    // handling data error
    if (!$data['year'] || !$data['price'] || !$data['mileage'] || !$data['dept']) {
        echo "Données non conformes";
        return;
    }

    // format and prepare datas for insert
    $ads_date = date("Y-m-d");
    $imagesString = !empty($uploadedImages) ? implode(',', $uploadedImages) : '/assets/images/default_cars.png';

    $sql = "INSERT INTO used_vehicules (brand, model, color, mileage, year, fuel_type, gearbox, warranty, price, finish, pictures, location, dept, ads_date)
            VALUES (:brand, :model, :color, :mileage, :year, :fuel_type, :gearbox, :warranty, :price, :finish, :pictures, :location, :dept, :ads_date)";
    
    try {
        $stmt = $pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindParam(':' . $key, $data[$key]);
        }
        $stmt->bindParam(':pictures', $imagesString);
        $stmt->bindParam(':ads_date', $ads_date);
        $stmt->execute();
        header("Location: ../templates/admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout des données : " . $e->getMessage();
    }
}

// HANDLE IMAGES UPLOAD
function uploadImages($files, $isUpdate = false)
{
    $uploadedImages = [];
    $maxSize = 5000000; // 5MB 

    $inputName = $isUpdate ? 'new_pictures' : 'pictures';

    if ($isUpdate && empty($files[$inputName]['tmp_name'][0])) {
        return $uploadedImages;
    }

    if (isset($files[$inputName]) && count($files[$inputName]['tmp_name']) <= 1) {
        $pictures = $files[$inputName];
        foreach ($pictures['tmp_name'] as $key => $tmpName) {
            if ($pictures['error'][$key] == UPLOAD_ERR_OK) {
                // image type handler
                if (!getimagesize($tmpName)) {
                    echo "Le fichier chargé n'est pas une image valide.";
                    exit;
                }

                // image size handler
                if ($pictures['size'][$key] > $maxSize) {
                    echo "La taille de l'image dépasse la limite autorisée (5MB).";
                    exit;
                }

                $originalName = basename($pictures['name'][$key]);
                $uniqueFileName = time() . '_' . $originalName;
                $destination = '../occasions/' . $uniqueFileName;
                if (move_uploaded_file($tmpName, $destination)) {
                    $uploadedImages[] = $destination;
                }
            }
        }
    } else {
        echo "Vous ne pouvez ajouter qu'une seule image'.";
        exit;
    }
    return $uploadedImages;
}
// UPDATE VEHICLE 
function updateVehicle($pdo, $id, $data, $uploadedImages)
{

    $imagesString = !empty($uploadedImages) ? implode(',', $uploadedImages) : (isset($data['existing_pictures']) ? $data['existing_pictures'] : '');

    $sql = "UPDATE used_vehicules SET brand = :brand, model = :model, color = :color, mileage = :mileage, year = :year, fuel_type = :fuel_type, gearbox = :gearbox, warranty = :warranty, price = :price, finish = :finish, pictures = :pictures, location = :location, dept = :dept WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        foreach ($data as $key => $value) {
            if ($key != 'existing_pictures' && $key != 'id' && $key != 'update_vehicle' && $key != 'new_pictures') {
                $stmt->bindParam(':' . $key, $data[$key]);
            }
        }
        $stmt->bindParam(':pictures', $imagesString);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: ../templates/admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour des données : " . $e->getMessage();
    }
}
// ERASE VEHICLE FROM DB
function deleteVehicleById($pdo, $article_id)
{
    $sql = "DELETE FROM used_vehicules WHERE id = :article_id";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':article_id', $article_id, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: ../templates/admin.php");
        exit();
    } catch (PDOException $e) {

        echo "Erreur : " . $e->getMessage();
    }
}
// CHECK ADD VEHICLE FORM SUBMISSION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_vehicle'])) {
    $uploadedImages = uploadImages($_FILES);

    $data = [
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'color' => $_POST['color'],
        'mileage' => $_POST['mileage'],
        'year' => $_POST['year'],
        'fuel_type' => $_POST['fuel_type'],
        'gearbox' => $_POST['gearbox'],
        'warranty' => $_POST['warranty'],
        'price' => $_POST['price'],
        'finish' => $_POST['finish'],
        'location' => $_POST['location'],
        'dept' => $_POST['dept']
    ];

    insertVehicle($pdo, $data, $uploadedImages);
}
// CHECK UPDATE VEHICLE FORM SUBMISSION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_vehicle'])) {
    $uploadedImages = uploadImages($_FILES, true);
    $data = $_POST;

    updateVehicle($pdo, $_POST['id'], $data, $uploadedImages);
}
// CHECK DELETE USED CAR FORM SUBMISSION
if (isset($_GET['delete_id'])) {
    $article_id = $_GET['delete_id'];
    deleteVehicleById($pdo, $article_id);
}

$articles = getUsedVehicles($pdo);
