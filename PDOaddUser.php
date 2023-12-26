<?php

include __DIR__ . "../config/config.php";

if (isset($_POST["add_user"])) {

    if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin") {
        // Récupérer les données 
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["prenom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);
        $role = htmlspecialchars($_POST["role"]);

        // Hash mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        /* var_dump('etape1'); */
        try {
            // Établir la connexion à la base de données avec PDO
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

            // Préparer la requête SQL pour insérer un nouvel utilisateur
            $sql = "INSERT INTO utilisateurs_parrot (nom, prenom, email, mot_de_passe, role) 
                    VALUES (:nom, :prenom, :email, :mot_de_passe, :role)";

            // Préparer et exécuter la requête avec PDO
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe_hash);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            /* var_dump('etape2'); */
            // Rediriger l'utilisateur après l'ajout
            header("Location: admin.php");
            exit();
        } catch (PDOException $e) {
            die("La création de l'utilisateur a échoué : " . $e->getMessage());
            /* var_dump('etape3'); */
        }
    } else {
        $errorMessage = "Vous n'avez pas les droits pour la création d'utilisateurs!";
        echo "<div id=\"errorMessageContainer\" class=\"clientele\" style=\"position: absolute; color: red; max-height:50px !important;\"><fieldset><label>$errorMessage</label></fieldset></div>";

        echo "<script>
            
            var errorMessageContainer = document.getElementById('errorMessageContainer');
            
            var delai = 2000;
            setTimeout(function() {
                errorMessageContainer.style.display = 'none'; 
            }, delai);
        </script>";
    }
}
