<?php

$pdo = connectToDatabase();

function getServices($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT id, svc_name, svc_price, svc_time FROM services ORDER BY svc_name ASC");
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($services as $key => $service) {
            $services[$key]['svc_name'] = ucwords(strtolower($service['svc_name']));
        }

        return $services;
    } catch (PDOException $e) {
        echo "Erreur de requête : " . $e->getMessage();
        return [];
    }
}

function addService($pdo, $svc_name, $svc_price, $svc_time) {
    try {
        $stmt = $pdo->prepare("INSERT INTO services (svc_name, svc_price, svc_time) VALUES (:svc_name, :svc_price, :svc_time)");
        $stmt->bindParam(':svc_name', $svc_name, PDO::PARAM_STR);
        $stmt->bindParam(':svc_price', $svc_price, PDO::PARAM_STR);
        $stmt->bindParam(':svc_time', $svc_time, PDO::PARAM_STR);
        $stmt->execute();
        echo "Service ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du service : " . $e->getMessage();
    }
}

function deleteService($pdo, $serviceId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(':id', $serviceId, PDO::PARAM_INT);
        $stmt->execute();
        echo "Service supprimé avec succès.";
        header("Location: admin.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du service : " . $e->getMessage();
    }
}

function getSelectedService($services, $selectedServiceName) {
    foreach ($services as $service) {
        if ($service['svc_name'] == $selectedServiceName) {
            return $service;
        }
    }
    return [];
}

// call back selected ID with GET
if (isset($_GET['id'])) {
    $serviceId = $_GET['id'];
    deleteService($pdo, $serviceId);
}

$services = getServices($pdo);

if (isset($_POST['add_service_btn'])) {
    addService($pdo, $_POST["svc_name"], $_POST["svc_price"], $_POST["svc_time"]);
}

$selectedService = [];
if (isset($_POST['reponse-selector'])) {
    $selectedService = getSelectedService($services, $_POST['reponse-selector']);
}
