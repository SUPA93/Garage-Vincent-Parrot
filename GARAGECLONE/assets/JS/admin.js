// FUNCTION TO TOGGLE FIELDSET ON ADMIN/SALARY PAGE
function toggleFieldsets() {
    var actionSelect = document.getElementById("action");
    var gestionUsersFieldset = document.getElementById("gestion_users");
    var gestionContactFieldset = document.getElementById("user_message_display");
    var openTimeFieldset = document.getElementById("open_time");
    var feedBackFieldset = document.getElementById("feedBack");
    var usedCarslistFieldset = document.getElementById("used_cars_list");
    var gestionServiceFieldset = document.getElementById("service_table");


    if (actionSelect.value === "adminAddUSer") {
        gestionUsersFieldset.style.display = "block";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "none";

    } else if (actionSelect.value === "adminAddCar") {
        window.location.href = 'adminAddCar.php';
    } else if (actionSelect.value === "adminSchedules") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "block";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "none";

    } else if (actionSelect.value === "adminReview") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "block";
        gestionContactFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "none";

    } else if (actionSelect.value === "adminContact") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "block";
        usedCarslistFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "none";

    } else if (actionSelect.value === "adminCarList") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "block";
        gestionServiceFieldset.style.display = "none";

    } else if (actionSelect.value === "adminService") {
        gestionUsersFieldset.style.display = "none";
        openTimeFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "block";
    } else {
        openTimeFieldset.style.display = "none";
        usedCarslistFieldset.style.display = "none";
        gestionUsedFieldset.style.display = "none";
        feedBackFieldset.style.display = "none";
        gestionContactFieldset.style.display = "none";
        gestionServiceFieldset.style.display = "none";
    }
}
    // Écouteur pour le changement de la sélection d'action
    var actionSelect = document.getElementById("action");
    actionSelect.addEventListener("change", toggleFieldsets);
    
    toggleFieldsets();