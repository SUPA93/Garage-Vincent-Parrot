// Sélectionnez le formulaire HTML par son ID
const formulaire = document.getElementById("formulaire");

// Écouteur d'événements pour le soumission du formulaire
formulaire.addEventListener("submit", function (event) {
    event.preventDefault(); // Empêche la soumission par défaut du formulaire

    // Créez un objet FormData pour collecter les données du formulaire
    const formData = new FormData(this);

    // Créez un tableau vide pour stocker les données si besoin
    const formDataArray = [];

    // Parcourez les paires clé-valeur dans l'objet FormData
    formData.forEach(function (value, key) {
        // Ajoutez chaque valeur au tableau 
        formDataArray.push({ key, value });
    });

    // Afficher une fenêtre de confirmation
    if (confirm('Voulez-vous vraiment envoyer ce formulaire?')) {
        // Si l'utilisateur confirme, attendez puis effectuez la redirection avec un message de succès

        // Afficher un message de succès qui disparaît automatiquement
        const successMessage = document.createElement('div');
        successMessage.textContent = 'Message envoyé avec succès.';
        successMessage.style.backgroundColor = 'green';
        successMessage.style.color = 'white';
        successMessage.style.padding = '10px';
        successMessage.style.position = 'fixed';
        successMessage.style.top = '0';
        successMessage.style.left = '0';
        successMessage.style.width = '100%';
        successMessage.style.textAlign = 'center';
        document.body.appendChild(successMessage);

        // Réinitialisez le formulaire après la soumission
        this.reset();

        setTimeout(() => {
            // Pour faire disparaître automatiquement
            successMessage.style.display = 'none';
            // Effectuez la redirection vers index.php après 2000 ms (2 secondes)
            window.location.href = 'index.php';
        }, 2000);
    } else {
        // Si le formulaire n'est pas valide, affichez un message d'erreur
        alert('Veuillez remplir tous les champs requis.');
    }
});

// Fonction pour afficher ou masquer les champs en fonction de l'objet choisi
function toggleChamps() {
    var objetSelect = document.getElementById("objet");
    var emailField = document.getElementById("mailing");
    var adressField = document.getElementById("adressing");
    var fichierField = document.getElementById("filing");
    var thanksLabel = document.getElementById("thanking");

    if (objetSelect.value === "demande_de_contact") {
        emailField.style.display = "block";
        adressField.style.display = "none";
        fichierField.style.display = "none";
        thanksLabel.style.display = "none";
    } else if (objetSelect.value === "report_bug") {
        emailField.style.display = "none";
        adressField.style.display = "none";
        fichierField.style.display = "none";
        thanksLabel.style.display = "block";
    } else if (objetSelect.value === "offre_emploi") {
        emailField.style.display = "none";
        adressField.style.display = "none";
        fichierField.style.display = "block";
        thanksLabel.style.display = "none";
    } else if (objetSelect.value === "envoi_brochure_tarifiaire") {
        emailField.style.display = "none";
        adressField.style.display = "block";
        fichierField.style.display = "none";
        thanksLabel.style.display = "none";
    } else {
        emailField.style.display = "none";
        adressField.style.display = "none";
        fichierField.style.display = "none";
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

    // Si "Un professionnel" est sélectionné, affichez le label "Société", sinon masquez-le
    if (professionnelRadio.checked) {
        societeLabel.style.display = "block";
    } else {
        societeLabel.style.display = "none";
    }
}

// Écouteur d'événements pour le changement de la sélection du bouton radio "Un professionnel"
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

// Écouteur d'événements pour le changement de la sélection du bouton radio "Particulier"
var particulierRadio = document.getElementById("particulier");
particulierRadio.addEventListener("change", hideSocieteLabel);

// Appelez les fonctions initiales pour définir l'état initial des champs, du label "Société" et du bouton radio "Particulier"
toggleChamps();
toggleSocieteLabel();
hideSocieteLabel();
