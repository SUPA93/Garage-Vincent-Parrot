<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include __DIR__ . "../config/config.php"; // Inclure le fichier de configuration avec les informations de connexion

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];


    try {
        // Établir la connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

        // Préparer la requête SQL pour récupérer le mot de passe haché associé à l'email
        $sql = "SELECT * FROM utilisateurs_parrot WHERE email = :email";

        // Préparer et exécuter la requête avec PDO
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        var_dump($result);
        
        if ($result && $password === $result['mot_de_passe']) {
            // Authentification réussie
            /* $_SESSION["user_email"] = $email; */
            $_SESSION["user"] = ["name"=>$result["nom"],
            "firstname"=>$result["prenom"],
            "email"=>$result["email"],
            "role"=>$result["role"]
        ];
        
            // Récupérer le rôle de l'utilisateur depuis la base de données
            $userRole = $result['role'];
            
            // Redirigez l'utilisateur en fonction de son rôle
            if ($userRole === "admin") {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            // Authentification échouée
            $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        die("La connexion à la base de données a échoué : " . $e->getMessage());
    }

    // Fermer la connexion à la base de données
    $pdo = null;
}
