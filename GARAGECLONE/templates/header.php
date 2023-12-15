<?php
include_once __DIR__ . '/../lib/config.php';
require_once BASE_PATH . '/lib/menu.php';
include_once __DIR__ . '/../lib/pdo.php';
include_once __DIR__ . '/../lib/connexions.php';
require_once __DIR__ . '/../lib/schedule.php';

/* if (session_status() === PHP_SESSION_NONE) {
} */
session_start();
// False by default
$isAdminOrUser = false;

if (isset($_SESSION["user"]["role"])) {
    $userRole = $_SESSION["user"]["role"];
    /* echo $_SESSION["user"]["role"]; */

    if ($userRole === "admin" || $userRole === "user") {
        $isAdminOrUser = true;
    }
}
if ($isAdminOrUser) {
    // dynamic nav if session isAdminOrUser
    $main_menu["contactUs.php"]["exclude"] = true;
    $main_menu["admin.php"]["exclude"] = false;
}

// GET THE CURRENT PAGE
/* $currentPage = htmlentities(basename($_SERVER['PHP_SELF'])); */
$currentPage = htmlentities(basename($_SERVER["SCRIPT_NAME"]));
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $main_menu[$currentPage]["meta_description"] ?>">
    <!-- <link rel="manifest" href="../manifest.json"> -->
    
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
    <link rel="icon" href="../assets/la-satisfaction.png" type="image/x-icon">

</head>

<body>
    <header>
        <div class="logo">
            <a href="/index.php">
                <img src="/ressources/parrotimage.png" alt="LOGO VPARROT" title="Garage Vincent Parrot">
            </a>
        </div>
        <nav id="nav">
            <!-- TAKE IT OF (<p></p>) TO CHANGE DISPLAY SIDE OF BUTTON BURGER-->
            <p></p>
            <ul>
                <?php
                require_once __DIR__ . "/../lib/menu.php";
                foreach ($main_menu as $key => $menu_item) {
                    $isActive = "";
                    if ($key === $currentPage) {
                        $isActive = "active";
                    }
                    $shouldExclude = isset($menu_item["exclude"]) && $menu_item["exclude"];
                    if (!$shouldExclude) {
                        $path = isset($menu_item["path"]) ? $menu_item["path"] : "/" . $key;
                        ?>
                        <li class="<?= $isActive; ?>">
                            <a href="<?= $path; ?>"><?= $menu_item["title"] ?></a>
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
        <!-- LINE FOR DISPLAY SESSION TIME LEFT -->
        <!-- <div id="sessionTimer" data-start-time="<?php /*echo $_SESSION['session_start_time'] ?? ''; */?>"></div> -->