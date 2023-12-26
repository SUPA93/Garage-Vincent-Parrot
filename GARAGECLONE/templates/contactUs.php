<!-- USER'S CONTACT PAGE -->
<?php 
require_once "../lib/config.php";
require_once "../lib/pdo.php";
require_once "../lib/contact.php";
require_once __DIR__ . "/header.php";
?>
<section class="inscription">
    <h1>Formulaire de contact</h1>
<?php 
    require_once __DIR__ ."/sendContact_form.php";
?>
    </section>

<?php require_once __DIR__ . "/footer.php";  ?>