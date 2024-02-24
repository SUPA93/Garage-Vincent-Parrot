<?php
// validateFieldsCars.php
function validateVehicleData($data)
{
    $errors = [];
    $escapeHTML = function ($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    };

    // validation for brand
    if (empty($data['brand'])) {
        $errors[] = "La marque est obligatoire !";
    } elseif (strlen($data['brand']) > 50) {
        $errors[] = "La marque ne doit pas dépasser 50 caractères !";
    } elseif (strlen($data['brand']) < 3) {
        $errors[] = $escapeHTML("La marque doit contenir au moins 3 caractères !");
    } elseif (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s\-]+$/", $data['brand'])) {
        $errors[] = "La marque ne peut contenir que des lettres, des espaces, des tirets et des caractères accentués!";
    } elseif (preg_match("/[-]{2,}|[ ]{2,}|^[ -]|[ -]$/", $data['brand'])) {
        $errors[] = $escapeHTML("La marque ne peut pas contenir plus de 2 tirets ou espaces consécutifs, commencer ou finir par un tiret ou un espace!");
    } elseif (preg_match("/[0-9!@#$%^&*(),.?\":{}|<>]/", $data['brand'])) {
        $errors[] = $escapeHTML("La marque ne peut pas contenir de chiffres ou de caractères spéciaux!");
    }

    // validation for model
    if (empty($data['model'])) {
        $errors[] = $escapeHTML("Le modèle est obligatoire !");
    } elseif (strlen($data['model']) > 50) {
        $errors[] = $escapeHTML("Le modèle ne doit pas dépasser 50 caractères!");
    } elseif (strlen($data['model']) < 2) {
        $errors[] = $escapeHTML("Le modèle doit contenir au moins 2 caractères!");
    } elseif (preg_match("/[-]{2,}|[ ]{2,}|^[ -]|[ -]$/", $data['model'])) {
        $errors[] = $escapeHTML("Le modèle ne peut pas contenir plus de 2 tirets ou espaces consécutifs, commencer ou finir par un tiret ou un espace!");
    } elseif (!preg_match("/^[A-Za-z0-9\s\-]{2,50}$/", $data['model'])) {
        $errors[] = $escapeHTML("Le modèle ne peut contenir que des lettres, des chiffres, des espaces et des tirets!");
    }

    //validation for mileage
    if (!filter_var($data['mileage'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)))) {
        $errors[] = $escapeHTML('Veuillez entrer un kilométrage valide!');
    } elseif ($data['mileage'] > 100000) {
        $errors[] = $escapeHTML('Le kilométrage ne doit pas dépasser 100 000 km!');
    }

    // validation for year
    define('YEAR_MIN', 2000); 
    define('YEAR_MAX', date('Y')); 

    if ($data['year'] < YEAR_MIN || $data['year'] > YEAR_MAX) {
        $errors[] = $escapeHTML('Veuillez entrer une année de mise en circulation valide (entre ' . YEAR_MIN . ' et ' . YEAR_MAX . ')!');
    }

    // validation for price
    if (filter_var($data['price'], FILTER_VALIDATE_FLOAT) === false || $data['price'] <= 0) {
        $errors[] = $escapeHTML("Veuillez entrer un prix valide.");
    } elseif ($data['price'] > 500000) {
        $errors[] = $escapeHTML("Le prix ne doit pas dépasser 500 000 €!");
    } elseif ($data['price'] != intval($data['price'])) {
        $errors[] = $escapeHTML("Le prix ne peut pas contenir de décimales!");
    }
    // Sanitisation
    foreach ($data as $key => &$value) {
        $value = $escapeHTML($value);
    }
    return $errors;
}
