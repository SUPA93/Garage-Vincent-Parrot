<!-- ADD NEW USER FORM -->
<form method="post" >
    <fieldset id="gestion_users">
        <!-- Ajout suppression modification d'utilisateurs-->
        <h2>Création d'utilisateur</h2>
        <div id="errorMessageContainer"></div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>

        <label for="role">Rôle :</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="user">Utilisateur</option>
        </select>

        <button class="btninscription" type="submit" name="add_user">Valider</button>
    </fieldset>
</form>