<!-- CONNEXION MEMBER'S FORM -->
<form method="post">
        <fieldset>
            <legend>Informations de connexion</legend>
            <!-- ERROR MESSAGE DISPLAY -->
            <?php if ($errorMessage != ''): ?>
            <div id="error-message" style="color: red;">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" id="email" required placeholder="Votre adresse e-mail">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required placeholder="Votre mot de passe">
            <button type="submit" name="send_connexion">Connexion</button>
        </fieldset>
</form>