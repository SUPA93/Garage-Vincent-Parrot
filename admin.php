<?php require_once __DIR__ . "/templates/header.php";

include __DIR__ . "/connexion_handler.php";
include __DIR__ . "/PDOfeedback.php";
/* action="traitement_admin.php"  action form à modifier*/
?>
<h1 class="inscription">Bonjour <?php /* echo */ $userRole; ?></h1>

<button class="btninscription">
    <a href="logout.php">Deconnexion</a>
</button>
<section class="inscription">
    <h2>Administration</h2>
    <!-- Gestion des utilisateurs -->
    <form method="post">
        <div>
            <label for="action"></label>
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
    </form>
    <!-- Formulaire pour la mise à jour des horaires -->
    <form method="post" action="PDOhoraires.php">
        <fieldset id="open_time">
            <!-- Modification des horaires d'ouverture -->
            <h2>Modifier les Horaires</h2>

            <!-- Menu déroulant avec les jours de la semaine -->
            <label for="day">Sélectionnez le jour :</label>
            <select name="day" id="day" required>
                <?php foreach ($horaires as $jour => $horaire) { ?>
                    <option value="<?php echo $jour; ?>"><?php echo ucfirst($jour); ?></option>
                <?php } ?>
            </select>

            <!-- Champ de saisie pour l'ouverture -->
            <label for="opening_time">Heure d'Ouverture :</label>
            <input type="text" id="opening_time" name="opening_time" placeholder="HH:MM" required>

            <!-- Champ de saisie pour la fermeture -->
            <label for="closing_time">Heure de Fermeture :</label>
            <input type="text" id="closing_time" name="closing_time" placeholder="HH:MM" required>

            <!-- Bouton pour modifier les horaires -->
            <button class="btninscription" type="submit">Modifier Horaires</button>
        </fieldset>
    </form>
    <form method="post">
        <fieldset id="feedBack">
            <h2>Liste des avis</h2>
            <table class="tftable" border="1">
                <thead>
                    <tr>
                        <th></th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Message</th>
                        <th>Note</th>
                        <th>Valider</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    foreach ($feedbacks as $feedback) {
                        echo "<tr>";
                        echo "<td>{$feedback['id']}</td>";
                        echo "<td>{$feedback['first_name']}</td>";
                        echo "<td>{$feedback['last_name']}</td>";
                        echo "<td>{$feedback['feedback']}</td>";
                        echo "<td>{$feedback['note']}</td>";
                        echo "<td>";
                        if ($feedback['valide']) {
                            echo "<a href='valider_comment.php?id={$feedback['id']}'>Désafficher</a>";
                        } else {
                            echo "<a href='valider_comment.php?id={$feedback['id']}'>Afficher</a>";
                        }
                        echo "</td>";
                        echo "<td><a href='delete_comment.php?id={$feedback['id']}'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </thead>
            </table>
        </fieldset>
    </form>

    <div id="used_cars_list">
        <!-- Liste des annonces existantes -->
        <h2>Liste des Annonces</h2>
        <ul>
            <!-- Afficher ici la liste des annonces avec des liens pour les modifier/supprimer -->
        </ul>
    </div>
</section>
<?php require_once __DIR__ . "/templates/footer.php"; ?>