<?php require_once __DIR__."/templates/header.php";?>

<header><!--LOGO--------------------------------------->
    <div class="logo">
        <a href="index.html">
            <img src=ressources/parrotimage.PNG alt="LOGO VPARROT" title="Garage Vincent Parrot">
        </a>
    </div><!--NAVBAR-->
    <nav class="navbar">
        <ul>
            <li>
                <a href="prestations.html">PRESTATIONS</a>
            </li>
            <li>
                <a href="position.html">GARAGES</a>
            </li>
            <li>
                <a href="occasions.html">OCCASIONS</a>
            </li>
            <li>
                <a href="connexion.html">CONNECTEZ-VOUS</a>
            </li>

        </ul>
    </nav>
</header>
<h1 class="inscription">Espace connexion</h1>
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
            <a href="subscribe.html">Inscription</a>
        </button>
    </fieldset>
</form>