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
    <form action="devis.php" method="post">
        <label for="immatriculation">Votre immatriculation</label><br>
        <input type="text" id="immat" name="immatriculation" placeholder="ex: AB 123 CD "><br>
        <label for="reponse-selector">Type de préstation</label>
        <select name="reponse-selector" id="reponse-selector">
            <?php
            foreach ($services as $service) {
                echo "<option value='" . $service['svc_name'] . "'>" . $service['svc_name'] . "</option>";
            } ?>
        </select>
        <input type="submit" class="btninscription" value="Devis">
    </form>
</article>

<h2 class="inscription">Les derniers avis</h2>
<section class="derniers-avis">
    <!-- Conteneur du carrousel -->
    <div class="carousel-container">
        <div class="carousel">
            <?php
            usort($feedbacks, function ($a, $b) {
                return $a['id'] - $b['id'];
            });
            foreach ($feedbacks as $index => $feedback) :
                if ($feedback['valide']) :
            ?>
                    <div class="avis-carte">
                        <h3><?= $feedback['first_name'] ?> <?= $feedback['last_name'] ?></h3>
                        <p><?= $feedback['feedback'] ?></p>
                        <p>Note : <?= $feedback['note'] ?>/5</p>
                        <p class="status">Avis vérifié</p>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</section>


<section class="inscription" id="feedbackSection">
    <form id="userFeedbackForm" method="post">
        <fieldset id="userFeedBack">
            <h2>Déjà client ? Dites-nous tout!</h2>
            <input type="hidden" name="my_form_feedback" value="my_unique_value">
            <label for="firstName" id="firstNameLabel">Prénom*</label>
            <input type="text" id="firstNameInput" name="firstName" placeholder="Prénom..." required autocomplete="given-name">
            <label for="familyName" id="familyNameLabel">Votre Nom*</label>
            <input type="text" id="familyNameInput" name="familyName" placeholder="Votre nom" required autocomplete="family-name">
            <label for="userMessage" id="userMessageLabel">Laissez un commentaire</label>
            <textarea id="userMessageInput" name="userMessage" cols="15" rows="3" placeholder="Votre message..."></textarea>
            <label for="userRating" id="userRatingLabel" required>Donnez nous une note (de 1 à 5)*</label>
            <select id="userRating" name="userRating" required>
                <option value="5">5 (Excellent)</option>
                <option value="4">4 (Bien)</option>
                <option value="3">3 (Passable)</option>
                <option value="2">2 (Moyen)</option>
                <option value="1">1 (Mauvais)</option>
            </select>
            <div>
                <button class="btninscription" id="showFormButton" name="show_form">Laisser un avis</button>
                <button class="btninscription" name="send_feedback" type="submit">Envoyer</button>
                <button class="btninscription" id="hideFormButton" name="hide_form" type="button">Annuler</button>
            </div>
        </fieldset>
    </form>
</section>
<article class="article3">
    <h4>En ce moment: profitez de la recharge clim<br>
        a -15% !</h4>
    <img src="ressources/clim.png" alt="climatisation" title="climatisation">
</article>

<?php require_once __DIR__ . "/templates/footer.php"; ?>