<!-- USER'S SEND REVIEW FORM -->
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