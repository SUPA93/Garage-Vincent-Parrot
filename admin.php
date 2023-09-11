<?php require_once __DIR__ . "/templates/header.php";

include __DIR__."/connexion_handler.php";
var_dump($_SESSION["user"]);

?>

<h1>Administration</h1>

<!-- Gestion des utilisateurs -->
<h2>Gestion des Utilisateurs</h2>
<form action="traitement_utilisateurs.php" method="post">
    <!-- Champs pour ajouter un nouvel utilisateur -->
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

    <button type="submit">Ajouter Utilisateur</button>
</form>

<!-- Modification des horaires d'ouverture -->
<!-- <h2>Horaires d'Ouverture</h2>
<form action="traitement_horaires.php" method="post"> -->
    <!-- Champs pour modifier les horaires -->
    <!-- <label for="lun">Lundi :</label>
    <input type="text" id="lun" name="lun">

    <label for="mar">Mardi :</label>
    <input type="text" id="mar" name="mar"> -->

    <!-- Ajoutez des champs similaires pour les autres jours de la semaine -->

    <!-- <button type="submit">Modifier Horaires</button>
</form> -->

<!-- Gestion des annonces de véhicules d'occasion -->
<h2>Gestion des Annonces de Véhicules d'Occasion</h2>
<form action="traitement_annonces.php" method="post" enctype="multipart/form-data">
    <!-- Champs pour ajouter/modifier des annonces -->
    <label for="brand">Marque :</label>
    <input type="text" id="brand" name="brand" required>

    <label for="model">Modèle :</label>
    <input type="text" id="model" name="model" required>

    <!-- Ajoutez des champs similaires pour d'autres détails de l'annonce -->

    <label for="picture">Ajouter une photo :</label>
    <input type="file" id="picture" name="picture" accept="image/*">

    <button type="submit">Ajouter/Modifier Annonce</button>
</form>

<!-- Liste des annonces existantes -->
<h2>Liste des Annonces</h2>
<ul>
    <!-- Afficher ici la liste des annonces avec des liens pour les modifier/supprimer -->
</ul>

<a href="logout.php">Deconnexion</a>
<?php require_once __DIR__ . "/templates/footer.php"; ?>