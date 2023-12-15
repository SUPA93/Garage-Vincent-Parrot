<?php
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/pdo.php";

//CHECK PHP'S ERRORS
/* ini_set('display_errors', 1);
error_reporting(E_ALL);
 */

function startSession()
{
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.gc_maxlifetime', 60);
        session_start();
        if(!isset($_SESSION['session_start_time'])) {
            $_SESSION['session_start_time'] = time();
        }
    }
}
function getUserByEmail($pdo, $email)
{
    $sql = "SELECT * FROM utilisateurs_parrot WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();

}

function authenticateUser($user, $password)
{
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        startSession();
        $_SESSION["loggedin"] = true;
        $_SESSION["user"] = [
            "name" => $user["nom"],
            "firstname" => $user["prenom"],
            "email" => $user["email"],
            "role" => $user["role"]
        ];
        return true;
    }
    return false;
}
function redirectToDashboard($userRole)
{
    /* echo "Redirection vers le tableau de bord pour le rôle: $userRole<br>"; */
    if ($userRole === "admin" || $userRole === "user") {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
    exit();
}
if (isset($_POST["send_connexion"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    /* echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>"; */

    $pdo = connectToDatabase($dbHost, $dbName, $dbUser, $dbPassword);
    $user = getUserByEmail($pdo, $email);
    if (authenticateUser($user, $password)) {
        redirectToDashboard($user['role']);
    } else {
        $errorMessage = "Mail ou mot de passe incorrect. Veuillez réessayer.";
        echo "<label class=\"inscription\" style=\"position: relative; padding-top:0; margin-top:0; top: 10%; left: 50%; transform: translate(-50%, 50%); max-width: 400px; \"><fieldset><label>$errorMessage</label></fieldset></label>";
        echo "<script>
        setTimeout(function() {
            var errorMessageDiv = document.getElementById('error-message');
            errorMessageDiv.style.display = 'none';
        }, 2000);
        </script>";
    }
    $pdo = null;
}
