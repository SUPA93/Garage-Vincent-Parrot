<?php require_once __DIR__ . "/templates/header.php";
require __DIR__ . "/PDOconnexion.php";


?>

<div class="inscription">
    <div class="content">
        <h1>Espace connexion</h1>
        <form method="post">
            <fieldset>
                <legend>Informations de connexion</legend>
                <label for="email">Adresse e-mail</label>
                <input type="email" name="email" id="email" required placeholder="Votre adresse e-mail">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required placeholder="Votre mot de passe">
                <button type="submit" name="send_connexion">Connexion</button>

            </fieldset>
        </form>
    </div>
</div>
<?php require_once __DIR__ . "/templates/footer.php"; ?>