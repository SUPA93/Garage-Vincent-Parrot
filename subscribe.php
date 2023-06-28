<?php require_once __DIR__ ."/templates/header.php";?>

<h1 class="inscription">Formulaire d'inscription</h1>
<form action="inscription.php" method="post">
    <fieldset>
        <legend>Informations de connexion</legend>
        <label for="email">Adresse e-mail</label>
        <input type="email" name="email" id="email" required placeholder="Votre adresse e-mail">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required placeholder="Votre mot de passe">


    </fieldset>
    <fieldset>
        <legend>Civilité</legend>
        <div>
            <input type="radio" id="Mr" name="civilite" value="Mr">
            <label for="Mr" class="inline-label">Monsieur</label>
        </div>
        <div>
            <input type="radio" id="Mme" name="civilite" value="Mme">
            <label for="Mme" class="inline-label">Madame</label>
        </div>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" id="firstName" required placeholder="Votre prénom">

        <label for="lastName">Nom</label>
        <input type="text" name="lastName" id="lastName" required placeholder="Votre nom">

        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate" id="birthDate">

        <label for="phoneNumber">Numéro de téléphone</label>
        <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Votre numéro de téléphone">
    </fieldset>
    <fieldset>
        <legend>Adresse</legend>
        <label for="city">Ville</label>
        <input type="text" name="city" id="city" placeholder="Votre ville">

        <label for="zipCode">Code postal</label>
        <input type="number" name="zipCode" id="zipCode" placeholder="Votre code postal">

        <label for="address">Adresse</label>
        <textarea name="address" id="address" cols="30" rows="10" placeholder="Votre adresse"></textarea>
    </fieldset>
    </fieldset>
    <fieldset>
    </fieldset>
    <fieldset>
        <legend>Newsletter</legend>
        <input type="checkbox" name="newsletter" id="newsletter">
        <label for="newsletter" class="inline-label">J'accepte de recevoir la newsletter</label>
        <button type="submit">Je souhaite m'inscrire</button>
    </fieldset>
</form>

<?php require_once __DIR__ . "/templates/footer.php"; ?>