<?php require_once __DIR__ . "/templates/header.php";


?>

<article class="article1">
    <img src="ressources\VPARROTSANSFOND.png" alt="photo Vincent Parrot" title="Vincent Parrot">
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
<article class="clientele">
    <h1>Trouvez votre service</h1>
    <form action="/action_page.php">
        <label for="immatriculation">Mon immatriculation</label><br>
        <input type="text" id="immat" name="fname" placeholder="ex: AB 123 CD "><br>
        <label for="reponse-selector">Type de préstation</label>
        <select name="reponse-selector" id="reponse-selector">
            <option value="">Service</option>
            <option value="rep1">Entretien</option>
            <option value="rep2">Diagnostique</option>
            <option value="rep3">Distribution</option>
            <option value="rep4">Freinage</option>
            <option value="rep5">Echapement</option>
            <option value="rep6">Carroserie</option>
        </select>
        <button type="submit"><a href="devis.php">Devis</a></button>
    </form>
</article>
<h2 class="inscription">Les derniers avis</h2>
<section class="derniers-avis">
    <!-- Conteneur du carrousel -->
    <div class="carousel-container">
        <div class="carousel">
            <?php foreach ($feedbacks as $index => $feedback) : ?>
                <div class="avis-carte">
                    <h3><?= $feedback['first_name'] ?> <?= $feedback['last_name'] ?></h3>
                    <p>Note : <?= $feedback['note'] ?>/5</p>
                    <p><?= $feedback['feedback'] ?></p>
                    <?php if ($feedback['valide']) : ?>
                        <p class="status">Avis vérifié</p>
                    <?php else : ?>
                        <p class="status attente">Avis non vérifié</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<section class="inscription">
    <form id="userFeedbackForm" method="post">
        <fieldset id="userFeedBack">
            <h2>Laissez-nous votre avis</h2>
            <label for="firstName">Prénom*</label>
            <input type="text" id="firstName" name="firstName" placeholder="Prénom..." required autocomplete="given-name">
            <label for="famillyName">Votre Nom*</label>
            <input type="text" id="famillyName" name="famillyName" placeholder="Votre nom" required autocomplete="family-name">
            <label for="userMessage">Laissez un commentaire</label>
            <textarea id="userMessage" name="userMessage" cols="15" rows="3" placeholder="Votre message..."></textarea>
            <label for="userRating">Donnez nous une note (de 1 à 5)*</label>
            <select id="userRating" name="userRating">
                <option value="5">5 (Excellent)</option>
                <option value="4">4 (Bien)</option>
                <option value="3">3 (Passable)</option>
                <option value="2">2 (Moyen)</option>
                <option value="1">1 (Mauvais)</option>
            </select>
        </fieldset>
        <div>
            <h2>Déjà client ? Dites-nous tout...</h2>
            <button class="btninscription" id="notation" type="submit">Laissez-nous un avis</button>
        </div>
    </form>
</section>
<article class="article3">
    <h4>En ce moment: profitez de la recharge clim<br>
        a -15% !</h4>
    <img src="ressources/clim.png" alt="climatisation" title="climatisation">
</article>

<?php require_once __DIR__ . "/templates/footer.php"; ?>