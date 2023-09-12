<?php require_once __DIR__ . "/templates/header.php";

include __DIR__ . "/connexion_handler.php";

/* action="traitement_admin.php"  action form à modifier*/
?>
<section class="inscription">
    <h1>Administration</h1>
    <!-- Gestion des utilisateurs -->
    <form method="post">
        <div>
        <!-- Champs pour ajouter un nouvel utilisateur -->
        <label for="action">Action</label>
        <select type="text" name="action" id="action" required>
            <option value="gestion_utilisateur">Gérer les utilsateurs</option>
            <option value="gestion_occasions">Gérer les annonces</option>
            <option value="gestion_avis">Gérer les avis</option>
            <option value="gestion_horaires">Gérer les horaires</option>
        </select>
        </div>
        <fieldset id="gestion_users">
            <!-- Ajout suppression modifiacation d'utilisateurs-->
            <h2>Gestion des Utilisateurs</h2>
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
            <label for="type">Type :</label>
            <select id="type" name="type">
                <option value="intern">Interne</option>
                <option value="extern">Externe</option>
            </select>
            <select id="wish" name="type">
                <option value="add">Ajouter</option>
                <option value="change">Modifier</option>
                <option value="sup">Supprimer</option>
            </select>
            <button class="btninscription" type="submit">Valider</button>
        </fieldset>
        <fieldset id="open_time">
            <!-- Modification des horaires d'ouverture -->
            <h2>Horaires d'ouverture</h2>
            <select type="text" name="day" id="day" required>
                <option value="lun">Lundi</option>
                <option value="mar">Mardi</option>
                <option value="mer">Mercredi</option>
                <option value="jeu">Jeudi</option>
                <option value="ven">Vendredi</option>
                <option value="sam">Samedi</option>
            </select>
            <label for="time">Heure d'Ouverture :</label>
            <input type="text" id="time" name="time" placeholder="HH:MM" required>

            <button class="btninscription" type="submit">Modifier Horaires</button>

        </fieldset>
        <fieldset id="gestion_used">
            <h2>Gestion des Véhicules d'Occasion</h2>

            <label for="brand">Marque :</label>
            <input type="text" id="brand" name="brand" required>

            <label for="model">Modèle :</label>
            <input type="text" id="model" name="model" required>

            <label for="color">Couleur :</label>
            <input type="text" id="color" name="color" required>

            <label for="mileage">Kilométrage :</label>
            <input type="number" id="mileage" name="mileage" required>

            <label for="year">Année :</label>
            <input type="number" id="year" name="year" required>

            <label for="fuel_type">Type de carburant :</label>
            <input type="text" id="fuel_type" name="fuel_type" required>

            <label for="gearbox">Boîte de vitesses :</label>
            <input type="text" id="gearbox" name="gearbox" required>

            <label for="warranty">Garantie :</label>
            <input type="text" id="warranty" name="warranty" required>

            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" required>

            <label for="finish">Finition :</label>
            <input type="text" id="finish" name="finish" required>

            <label for="pictures">Ajouter une photo :</label>
            <input type="file" id="pictures" name="pictures[]" accept="image/*" multiple required>

            <label for="location">Emplacement :</label>
            <input type="text" id="location" name="location" required>

            <label for="dept">Département :</label>
            <input type="text" id="dept" name="dept" required>

            <button class="btninscription" type="submit" name="submit">Ajouter/Modifier Annonce</button>

        </fieldset>
        <fieldset class="tftable">
            <table  border="1" >
                <tbody>
                    <tr>
                        <th>Derniers Avis</th>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Prénom</td>
                    </tr>
                    <tr>
                        <td>Row:2 Cell:1</td>
                        <td>Row:2 Cell:2</td>
                        <td>Row:2 Cell:3</td>
                    </tr>
                    <tr>
                        <td>Row:3 Cell:1</td>
                        <td>Row:3 Cell:2</td>
                        <td>Row:3 Cell:3</td>
                    </tr>
                    <tr>
                        <td>Row:4 Cell:1</td>
                        <td>Row:4 Cell:2</td>
                        <td>Row:4 Cell:3</td>
                    </tr>
                    <tr>
                        <td>Row:5 Cell:1</td>
                        <td>Row:5 Cell:2</td>
                        <td>Row:5 Cell:3</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL</td>
                        <td>...</td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <!-- Liste des annonces existantes -->
    <h2>Liste des Annonces</h2>
    <ul>
        <!-- Afficher ici la liste des annonces avec des liens pour les modifier/supprimer -->
    </ul>
    <button class="btninscription">
        <a href="logout.php">Deconnexion</a>
    </button>
</section>
<?php require_once __DIR__ . "/templates/footer.php"; ?>