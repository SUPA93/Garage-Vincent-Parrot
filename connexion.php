<?php require_once __DIR__ . "/templates/header.php"; ?>



<div class="inscription">
    <h1>Espace connexion</h1>
    <form action="inscription.php" method="post">
        <fieldset>
            <legend>Informations de connexion</legend>
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" id="email" required placeholder="Votre adresse e-mail">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required placeholder="Votre mot de passe">
            <button type="submit">Connexion</button>
        </fieldset>
    </form>
    <form action="inscription.php" method="post">
        <fieldset>
            <legend>Pas encore inscrit(e)?</legend>
            <button class="btninscription">
                <a href="subscribe.php">Inscription</a>
            </button>
        </fieldset>
    </form>
</div>


<?php require_once __DIR__ . "/templates/footer.php"; ?>