<?php require_once __DIR__ . "/templates/header.php"; 


include __DIR__."/connexion_handler.php";

?>

<div class="inscription">

    <h1>Espace connexion</h1>
    <form method="post"> <!-- Pointez vers le deuxième fichier -->
        <fieldset>
            <legend>Informations de connexion</legend>
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" id="email" required placeholder="Votre adresse e-mail">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required placeholder="Votre mot de passe">
            <button type="submit">Connexion</button>
        </fieldset>
    </form>
    <form>
    <fieldset>
        <legend>Pas encore inscrit(e)?</legend>
        <button class="btninscription">
            <a href="subscribe.php">Inscription</a>
        </button>
    </fieldset>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>


