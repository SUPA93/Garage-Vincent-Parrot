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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $main_menu[$currentPage]["meta_description"] ?>">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <?php echo '<link rel="stylesheet" href="/assets/style/style.css">'; ?>
    <title> <?= $main_menu[$currentPage]["head_title"] ?></title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php">
                <img src=../ressources/parrotimage.PNG alt="LOGO VPARROT" title="Garage Vincent Parrot">
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