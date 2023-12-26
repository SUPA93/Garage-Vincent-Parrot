<?php
require_once __DIR__ . "/../lib/menu.php";
require __DIR__ . "../../config/config.php";
require __DIR__ . "../../PDOhoraires.php";
require __DIR__ . "../../PDOoccasions.php";
require __DIR__ . "../../PDOfeedback.php";
require __DIR__ . "../../PDOmessages.php";
require __DIR__ . "../../PDOservice.php";
require __DIR__ . "../../PDOaddUser.php";




if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isAdminOrUser = false;

if (isset($_SESSION["user"]["role"])) {
    $userRole = $_SESSION["user"]["role"];
    /* echo $_SESSION["user"]["role"]; */

    if ($userRole === "admin" || $userRole === "user") {
        $isAdminOrUser = true;
    }
}
if ($isAdminOrUser) {
    // On modifie les valeurs du tableau pour l'affichage dans la nav
    $main_menu["contact_form.php"]["exclude"] = true;
    $main_menu["admin.php"]["exclude"] = false;
}

// GET THE CURRENT PAGE
$currentPage = htmlentities(basename($_SERVER["SCRIPT_NAME"]));
$main_menu[$currentPage]["head_title"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $main_menu[$currentPage]["meta_description"] ?>">
    <link rel="manifest" href="../manifest.json">
    
    
    <!-- JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/style/jquery-ui.css">
    <script src="../assets/JS/jquery-ui.js"></script>
    <!--BOOTSTRAP-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--CSS -->
    <?php echo '<link rel="stylesheet" href="/assets/style/style.css">'; ?>
    <title> <?= $main_menu[$currentPage]["head_title"] ?></title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src=../ressources/parrotimage.png alt="LOGO VPARROT" title="Garage Vincent Parrot">
            </a>
        </div>
        <nav id="nav">
            <p></p>
            <ul>
                <?php
                foreach ($main_menu as $key => $menu_item) {
                    $isActive = "";
                    if ($key === $currentPage) {
                        $isActive = "active";
                    }
                    $shouldExclude = isset($menu_item["exclude"]) && $menu_item["exclude"];
                    // Ne pas afficher les éléments exclus
                    if (!$shouldExclude) {
                ?>
                        <li class="<?= $isActive; ?>">
                            <a href="<?= $key; ?>"><?= $menu_item["title"] ?></a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
            <div id="icons"></div>
        </nav>
    </header>
    <main>