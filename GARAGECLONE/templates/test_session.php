<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo "Connecté en tant que " . $_SESSION["user"]["name"];
} else {
    echo "Non connecté.";
}
