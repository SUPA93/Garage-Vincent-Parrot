<?php
/* error_reporting(E_ALL);
ini_set('display_errors', 1); */



include __dir__."../config/config.php"; 


if (isset($_POST["send_connexion"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // New pdo
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

        //  mot de passe haché 
        $sql = "SELECT * FROM utilisateurs_parrot WHERE email = :email";

        // requête avec PDO
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result && password_verify($password, $result['mot_de_passe'])) {
            // Authentification réussie
            // Création d'un session de connexion
            $_SESSION["loggedin"] = true;
            
            $_SESSION["user"] = [
                "name" => $result["nom"],
                "firstname" => $result["prenom"],
                "email" => $result["email"],
                "role" => $result["role"]
            ];
        
            // le rôle de l'utilisateur 
            $userRole = $result['role'];
            
            // Redirection en fonction du rôle
            if ($userRole === "admin") {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: admin.php");
                
                exit();
            }
        } else {
            // Authentification échouée
            $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
            echo "<div class=\"inscription\" style=\" height:10px; max-width:400px;\"><fieldset><label>$errorMessage</label></fieldset></div>";
        }
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }

    // Fermer la connexion à la base de données
    $pdo = null;
}
?>
