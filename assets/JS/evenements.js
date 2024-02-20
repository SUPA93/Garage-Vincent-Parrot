//gestion du formulaire de contact suivant les champs choisis
document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour afficher ou masquer les champs en fonction de objet dans le form
    function toggleChamps() {
        var objetSelect = document.getElementById("objet");
        var emailField = document.getElementById("mailing");
        var adressField = document.getElementById("adressing");
        var thanksLabel = document.getElementById("thanking");

        if (objetSelect.value === "contact") {
            emailField.style.display = "block";
            adressField.style.display = "none";
            thanksLabel.style.display = "none";
        } else if (objetSelect.value === "bug") {
            emailField.style.display = "none";
            adressField.style.display = "none";
            thanksLabel.style.display = "block";
        } else if (objetSelect.value === "emploi") {
            emailField.style.display = "none";
            adressField.style.display = "none";
            thanksLabel.style.display = "none";
        } else if (objetSelect.value === "brochure") {
            emailField.style.display = "none";
            adressField.style.display = "block";
            thanksLabel.style.display = "none";
        } else {
            emailField.style.display = "none";
            adressField.style.display = "none";
            thanksLabel.style.display = "none";
        }
    }
    // Écouteur d'événements pour le changement de la sélection d'objet
    var objetSelect = document.getElementById("objet");
    objetSelect.addEventListener("change", toggleChamps);

    // Fonction pour afficher ou masquer le label "Société"
    function toggleSocieteLabel() {
        var professionnelRadio = document.getElementById("professionnel");
        var societeLabel = document.getElementById("div_st");

        // Si "Un professionnel" est sélectionné, affichez le label "Société", sinon on le masque
        if (professionnelRadio.checked) {
            societeLabel.style.display = "block";
        } else {
            societeLabel.style.display = "none";
        }
    }

    // changement de la sélection du bouton radio "Un professionnel"
    var professionnelRadio = document.getElementById("professionnel");
    professionnelRadio.addEventListener("change", toggleSocieteLabel);

    // Fonction pour masquer le label "Société" lorsque le bouton radio "Particulier" est sélectionné
    function hideSocieteLabel() {
        var particulierRadio = document.getElementById("particulier");
        var societeLabel = document.getElementById("div_st");

        // Si "Particulier" est sélectionné, masquez le label "Société"
        if (particulierRadio.checked) {
            societeLabel.style.display = "none";
        }
    }
    // Écouteur pour le changement du bouton radio "Particulier"
    var particulierRadio = document.getElementById("particulier");
    particulierRadio.addEventListener("change", hideSocieteLabel);

    // Appeldes fonctions "Société" et du bouton radio "Particulier"
    toggleChamps();
    toggleSocieteLabel();
    hideSocieteLabel();
});
