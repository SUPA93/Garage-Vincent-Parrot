<?php

?>
<div class="bas">
    <footer class="pied">
        <ul class="contact">
            <li>
                <h4>Qui sommes nous ?</h4>
            </li>
            <li>Garage V Parrot</li>
            <li>32 Av. Victor Hugo</li>
            <li>31000 Toulouse</li>
            <li>
                <a href="tel: 05 42 42 42 42" title="cliquez pour appeler">Téléphone</a>
            </li>
        </ul>
        <?php

        require_once 'schedules_partial.php';
        ?>
        <ul class="sociaux">
            <li>
                <h5>Nos reseaux sociaux</h5>
            </li>
            <li><i class="fa-brands fa-instagram"></i><a href="#">Insta </a></li>
            <li><i class="fa-brands fa-facebook "></i><a href="#">Facebook</a></li>
            <li><i class="fa-brands fa-discord"> </i><a href="#">Discord</a></li>
            <li><i class="fa-brands fa-snapchat"> </i><a href="#">Snap</a></li>
        </ul>
    </footer>
</div>
</main>
<script>
    // Passer la valeur de temps de début de session de PHP à JavaScript
    const sessionStartTime = <?php echo json_encode($_SESSION['session_start_time'] ?? null); ?>;
</script>
<!-- <script src="https://kit.fontawesome.com/ba77b5bf65.js" crossorigin="anonymous"></script> -->
<?php
if ($currentPage === 'occasions.php') { ?>
    <script src="../assets/JS/sort_slider.js"></script>
    <!-- <script src="../assets/JS/sort_filter.js"></script> -->
    <script src="../assets/JS/index.js"></script>
<?php } elseif ($currentPage === 'index.php') { ?>
    <script src="../assets/JS/caroussel.js" type="module"></script>
    <script src="../assets/JS/feedback_form.js"></script>
    <script src="../assets/JS/index.js"></script>
<?php } elseif ($currentPage === 'admin.php') { ?>
    <script src="../assets/JS/admin.js"></script>
    <script src="../assets/JS/index.js"></script>
    <script src="../assets/JS/sessionTimer.js"></script>
<?php } elseif ($currentPage === 'contactUs.php') { ?>
    <script src="../assets/JS/evenements.js"></script>
<?php } else { ?>
    <script src="../assets/JS/index.js"></script>
<?php } ?>

</body>

</html>