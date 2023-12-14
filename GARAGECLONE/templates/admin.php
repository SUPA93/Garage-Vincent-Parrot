<!-- ADMINISTRATION PAGE FOR ADMIN AND SALARY (NOT CLIENT) -->
<?php
require_once  "../lib/config.php";
require_once __DIR__ . "/header.php";
require_once __DIR__ . "/../lib/connexions.php";

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    // USER NOT LOGGED IN RE LOCATION
    header("Location: connexion.php");
    exit();
}
// IF SET SUCCESS MESSAGE
if (isset($_SESSION['success_message'])) {
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    // ERASE SUCCES MESSAGE
    unset($_SESSION['success_message']);
}
?>
<!-- WELCOME DISPLAY LOGGED ID MESSAGE -->
<h1 class="inscription">Bonjour: <?php echo $_SESSION['user']['firstname']; ?></h1>

<button class="btninscription">
    <a href="logout.php">Deconnexion</a>
</button>
<section class="inscription">
    <h2>Administration</h2>
    <?php
    require "adminGestion_form.php";
    require_once "adminAddUser_form.php";
    require_once "adminSchedules_form.php";
    require_once "adminReview_form.php";
    require_once "adminContact_form.php";
    require_once "adminService_form.php";
    require_once "adminCars_form.php";
    ?>
</section>
<?php require_once __DIR__ . "/footer.php"; ?>