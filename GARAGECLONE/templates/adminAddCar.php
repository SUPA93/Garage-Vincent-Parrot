<!-- ADMIN'S CAR COMPONENT -->
<?php
require_once  "../lib/config.php";
require __DIR__ . "/header.php";

?>
<section class="inscription">
    <h1>Gestion des annonces</h1>
    <!-- <div class="navigation_admin"> -->
        
    <?php 
    require_once __DIR__ ."/adminAddCar_form.php";?>
   <!--  </div> -->
</section>
<?php
// ICI ON APPELLE LE FOOTER
require_once __DIR__ . "/footer.php";
?>