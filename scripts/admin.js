// Fonction pour afficher ou masquer les fieldsets en fonction de l'action choisie
function toggleFieldsets() {
    var actionSelect = document.getElementById("action");
    var gestionUsersFieldset = document.getElementById("gestion_users");

    var openTimeFieldset = document.getElementById("open_time");
    var feedBackFieldset = document.getElementById("feedBack");
    var usedCarslistFieldset = document.getElementById("used_cars_list");

    if (actionSelect.value === "gestion_utilisateur") {
        gestionUsersFieldset.style.display = "block";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
    } else if (actionSelect.value === "gestion_occasions") {
        window.location.href = 'occasions_handler.php';
    } else if (actionSelect.value === "gestion_horaires") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "block";
        feedBackFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
    } else if (actionSelect.value === "gestion_avis") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "block";
        usedCarslistFieldset.style.display = "none";
    } else {
        openTimeFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionUsedFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
    }
}
// Écouteur d'événements pour le changement de la sélection d'action
var actionSelect = document.getElementById("action");
actionSelect.addEventListener("change", toggleFieldsets);

// Appelez la fonction initiale pour définir l'état initial des fieldsets
toggleFieldsets();