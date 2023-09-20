<?php require_once __DIR__ . "/templates/header.php";
include __DIR__ . "/PDOconnexion.php";

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
                <option value="gestion_contact">Gérer les messages</option>
                <option value="gestion_horaires">Gérer les horaires</option>
                <option value="used_cars_list">Liste des véhicules</option>
                <option value="gestion_services">Gérer les services</option>
            </select>
        </div>
        <fieldset id="gestion_users">
            <!-- Ajout suppression modifiacation d'utilisateurs-->
            <h2>Création d'utilisateur</h2>
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
            <!-- <label for="type">Type :</label>
            <select id="type" name="type">
                <option value="intern">Interne</option>
                <option value="extern">Externe</option>
            </select> -->
            <!-- <select id="wish" name="type">
                <option value="add">Ajouter</option>
                <option value="change">Modifier</option>
                <option value="sup">Supprimer</option>
            </select> -->
            <button class="btninscription" type="submit" name="add_user">Valider</button>
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
                    usort($feedbacks, function ($a, $b) {
                        return $a['id'] - $b['id'];
                    });
                    foreach ($feedbacks as $feedback) {
                        echo "<tr>";
                        echo "<td>{$feedback['id']}</td>";
                        echo "<td>{$feedback['first_name']}</td>";
                        echo "<td>{$feedback['last_name']}</td>";
                        echo "<td>{$feedback['feedback']}</td>";
                        echo "<td>{$feedback['note']}</td>";
                        echo "<td>";
                        //Pour l'instant je n'ai pas géré l'affichage en dur...seulement l'option colorée.
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
    <form method="post" name="contact_form_user_message">
        <fieldset id="user_message_display">
            <h2>Liste des messages</h2>
            <table class="tftable" border="1">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Objet</th>
                        <th>Message</th>
                        <th>société</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    foreach ($messages as $message) : ?>
                        <tr>
                            <td><?= $message['nom'] ?></td>
                            <td><?= $message['objet'] ?></td>
                            <td><?= $message['message'] ?></td>
                            <td><?= $message['societe'] ?></td>
                            <td><a href='delete_message.php?id=<?= $message['id'] ?>'>Supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </fieldset>
    </form>
    <form method="post">
        <fieldset id="service_table">
            <h2>Liste des services</h2>
            <table class="tftable" border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service</th>
                        <th>Tarif</th>
                        <th>Durée</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php
                    foreach ($services as $service) {
                        echo "<tr>";
                        echo "<td>{$service['id']}</td>"; // ID du service
                        echo "<td>{$service['svc_name']}</td>"; // Nom du service
                        echo "<td>{$service['svc_price']}</td>"; // Tarif
                        echo "<td>{$service['svc_time']}</td>"; // Durée
                        echo "<td><a href='delete_service.php?id={$service['id']}'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </thead>
            </table>

            <h2>Ajouter un service</h2>
            <label for="svc_name">Nom du service:</label>
            <input type="text" name="svc_name" required autocomplete="svc_name"><br>

            <label for="svc_price">Prix du service:</label>
            <input type="text" name="svc_price" required><br>

            <label for="svc_time">Durée du service:</label>
            <input type="text" name="svc_time" required><br>

            <button type="submit" name="add_service_btn">Ajouter Service</button>
        </fieldset>
    </form>
    <form method="post" name="used_cars_display">
        <fieldset id="used_cars_list">
            <h2>Liste des véhicules</h2>
            <table class="tftable" border="1">
                <thead>
                    <tr>
                        <th></th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Année</th>
                        <th>Couleur</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php

                    foreach ($articles as $article) : ?>
                        <tr>
                            <td><?= $article['id'] ?></td>
                            <td><?= $article['brand'] ?></td>
                            <td><?= $article['model'] ?></td>
                            <td><?= $article['year'] ?></td>
                            <td><?= $article['color'] ?></td>
                            <td><?= $article['price'] ?></td>
                            <td><img style="max-width:50px" ; src="<?= $article["pictures"] ?>" alt="<?= $article["brand"] . " " . $article["model"] ?>" title="<?= $article["brand"] . " " . $article["model"] ?>"></td>
                            <td><a href='delete_used_cars.php?id=<?= $article['id'] ?>'>Supprimer</a></td>
                        </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </fieldset>
    </form>

</section>
<?php require_once __DIR__ . "/templates/footer.php"; ?>