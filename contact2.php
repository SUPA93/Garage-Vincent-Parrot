<?php require_once __DIR__ . "/templates/header.php"; ?>

<div class="inscription">
    <h1>Formulaire de contact</h1>
    <form action="/action_page.php" method="post">
        <fieldset id="infos">
            <legend>
                <h2>Informations</h2>
            </legend>

            <div id="div_nm">
                <label for="name">Nom : </label><input type="text" name="nom" id="name" placeholder="Votre nom" required="true">
            </div>
            <div id="div_fnm">
                <label for="firstname">Prénom : </label><input type="text" name="prenom" id="firstname" placeholder="Votre prénom" required="true">
            </div>


            <div id="choiceStatut">
                <label for="statut">Vous êtes :</label>
                <div>
                    <input type="radio" name="statut" id="particulier" required="true"><label for="particulier">Un particulier</label>
                </div>
                <div>
                    <input type="radio" name="statut" id="professionnel" required="true" checked><label for="professionnel">Un professionnel</label>
                </div>
            </div>

            <div id="div_st">
                <label for="societe">Société :</label><input type="text" name="societe" placeholder="Nom de la société" id="societe" required>
            </div>
        </fieldset>


        <fieldset id="message">
            <legend>
                <h2>Message</h2>
            </legend>
            <div>
                <label for="objet">Objet :</label>
                <select type="text" name="objet" id="objet" required>
                    <option value="demande_de_contact">Demande de contact</option>
                    <option value="demande_de_contact">Reporter un bug</option>
                    <option value="offre_d'emploi" selected>Offre d'emploi</option>
                    <option value="envoi_d'une_brochure_tarifiaire">Envoi d'une brochure tarifaire</option>
                </select>
            </div>
            <div>
                <label for="email">Email :</label><input type="email" id="email" name="email" placeholder="email@mail.com" required>
            </div>
            <textarea name="message" id="message" cols="" rows="10" placeholder="Message..." required></textarea>
            <button type="submit">ENVOYER</button>
        </fieldset>
    </form>
</div>
<script src="../scripts/evenements.js" type="module"></script>
<?php require_once __DIR__ . "/templates/footer.php"; ?>
</body>