<?php 
//Fonction de déconnexion
session_start();
session_destroy();
session_unset();
header('Location: connexion.php');
exit();

?>