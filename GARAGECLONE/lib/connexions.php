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
        ini_set('session.gc_maxlifetime', 300);
        session_start();
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
        $_SESSION['session_start_time'] = time();
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
    
    if ($userRole === "admin" || $userRole === "user") {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
    exit();
}
$errorMessage = '';
if (isset($_POST["send_connexion"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pdo = connectToDatabase($dbHost, $dbName, $dbUser, $dbPassword);
    $user = getUserByEmail($pdo, $email);
    if (authenticateUser($user, $password)) {
        redirectToDashboard($user['role']);
    } else {
        $errorMessage = "Mail ou mot de passe incorrect. Veuillez réessayer.";
        
    }
    $pdo = null;
}
