<?php require_once __DIR__ . "/templates/header.php"; ?>



<div class="inscription">
    <h1>Formulaire de contact</h1>
    <form action="/action_page.php" method="post">
        <fieldset>
            <label for="fname">Nom & prénom</label>
            <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">

            <label for="sujet">Sujet</label>
            <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">

            <label for="emailAddress">Email</label>
            <input id="emailAddress" type="email" name="email" placeholder="Votre email">


            <label for="subject">Message</label>
            <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>

        </fieldset>
        <fieldset>
            <button type="submit" value="Envoyer">ENVOYER</button>
        </fieldset>
    </form>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>