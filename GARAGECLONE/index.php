<?php
include_once __DIR__ . '/lib/config.php';
include_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/lib/review.php';
require_once __DIR__ . '/lib/service.php';
?>
<div class="iconlink">
    <a href="/templates/connexion.php">
        <img src="/ressources/iconlink.png" alt="icone de connexion" title="Connectez-vous">
        <span>connexion</span>
    </a>
</div>
<article class="article1">
    <img src="ressources/VPARROTSANSFOND.png" alt="photo Vincent Parrot" title="Vincent Parrot">
    <h1>Comparez,<br> réservez en toute confiance.</h1>
</article>
<!--SECTION ICONS -->
<article class="article2">
    <h2>Devis & RDV immédiats d'entretien auto depuis 1992</h2>
    <ul>
        <li>
            <img src="assets/calendrier.png" alt="calendar icon" title="calendrier"></a>
        </li>
        <li>
            <img src="assets/badge-de-reduction.png" alt="discount icon" title="réduction"></a>
        </li>
        <li>
            <img src="assets/garantie.png" alt="waranty icon" title="garantie"></a>
        </li>
        <li>
            <img src="assets/la-satisfaction.png" alt="feedback icon" title="avis"></a>
        </li>
    </ul>
    <ul>
        <li>
            <p>Devis en temps réel</p>
            <h3>RDV immédiat</h3>
        </li>
        <li>
            <p>Remises exclusives</p>
            <h3>Jusqu'à -40%</h3>
        </li>
        <li>
            <p>Pièces & main d'oeuvre</p>
            <h3>Garantie 5ans</h3>
        </li>
        <li>
            <p>Avis clients vérifiés</p>
            <h3>+50 000avis</h3>
        </li>
    </ul>
</article>
<!-- SERVICES SECTION -->
<article class="clientele">
    <h1>Trouvez votre service</h1>
    <?php require_once __DIR__ . ('/templates/service_partial.php'); ?>
</article>
<!-- CLIENTS FEEDBACK -->
<h2 class="inscription">Les derniers avis</h2>
<section class="derniers-avis">
    <?php require_once __DIR__ . ('/templates/review_partial.php'); ?>
</section>
<!-- FEEDBACK FORM -->
<section class="inscription" id="feedbackSection">
    <?php require_once __DIR__ . ('/templates/addReview_form.php'); ?>
</section>
<!-- PROMOTE SECTION -->
<article class="article3">
    <h3>En ce moment: profitez de la recharge clim<br>
        a -15% !</h3>
    <img src="ressources/clim3.jpg" alt="climatisation" title="climatisation">
</article>

<?php require_once __DIR__ . "/templates/footer.php"; ?>