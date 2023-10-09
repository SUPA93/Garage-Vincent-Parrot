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
        <ul class="horaires">
            <li>Nos Horaires</li>
            <?php foreach ($horaires as $jour => $horaire) { ?>
                <li id="<?php echo $jour; ?>">
                    <?php
                    $heureOuverture = substr($horaire['ouverture'], 0, 5);
                    $heureFermeture = substr($horaire['fermeture'], 0, 5);
                    echo ucfirst(substr($jour, 0, 3)) . ': ' . $heureOuverture . ' - ' . $heureFermeture; ?>
                </li>
            <?php } ?>
            <li id="dim">Dimanche: fermé</li>
        </ul>
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
<!-- <script src="https://kit.fontawesome.com/ba77b5bf65.js" crossorigin="anonymous"></script> -->
<script src="../scripts/caroussel.js" type="module"></script>
<script src="../scripts/sort_filter.js" type="module"></script>
<script src="../scripts/index.js"></script>
<script src="../scripts/evenements.js" type="module"></script>
<script src="../scripts/admin.js" type="module"></script>
<script src="../scripts/sort_slider.js" type="module"></script>
<script src="../scripts/feedback_form.js" type="module"></script>

</body>


</html>