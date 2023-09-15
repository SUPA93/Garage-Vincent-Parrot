<?php require_once __DIR__ . "/templates/header.php";
include 'PDOmessages.php';
?>
<section class="inscription">
    <h1>Formulaire de contact</h1>
    <form id="formulaire" method="post">
        <fieldset id="infos">
            <legend>
                <h2>Informations</h2>
            </legend>
            <div id="div_nm">
                <label for="name">Nom :</label>
                <input type="text" name="nom" id="name" placeholder="Votre nom" required autocomplete="family-name">
            </div>
            <div id="div_fnm">
                <label for="firstname">Prénom :</label>
                <input type="text" name="prenom" id="firstname" placeholder="Votre prénom" required autocomplete="given-name">
            </div>
            <div id="choiceStatut">
                <label for="statut">Vous êtes :</label>
                <div>
                    <input type="radio" name="statut" id="particulier" required checked>
                    <label for="particulier">Un particulier</label>
                </div>
                <div>
                    <input type="radio" name="statut" id="professionnel" required>
                    <label for="professionnel">Un professionnel</label>
                </div>
            </div>
            <div id="div_st">
                <label for="societe">Société :</label>
                <input type="text" name="societe" placeholder="Nom de la société" id="societe">
            </div>
        </fieldset>
        <fieldset id="message">
            <legend>
                <h2>Message</h2>
            </legend>
            <div>
                <label for="objet">Objet :</label>
                <select name="objet" id="objet" required>
                    <option value="demande_de_contact" selected>Demande de contact</option>
                    <option value="report_bug">Reporter un bug</option>
                    <option value="offre_emploi">Offre d'emploi</option>
                    <option value="envoi_brochure_tarifiaire">Envoi d'une brochure tarifaire</option>
                </select>
            </div>
            <div id="mailing">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" placeholder="email@mail.com" autocomplete="email">
            </div>
            <div id="adressing">
                <label for="adress">Votre adresse postale :</label>
                <input type="text" id="adress" name="adress" placeholder="n°, rue, code postal" autocomplete="address-line1">
            </div>
            <div id="filing">
                <label for="fichier">Envoyez-nous votre CV :</label>
                <input type="file" id="fichier" name="fichier" accept=".pdf, .doc, .docx">
            </div>
            <div id="thanking">
                <label for="thanks">Merci pour votre aide ❤</label>
            </div>
            <textarea name="message" id="messageField" cols="30" rows="10" placeholder="Message..."></textarea>
            <button type="submit">ENVOYER</button>
        </fieldset>
    </form>
</section>

<?php require_once __DIR__ . "/templates/footer.php";  ?>