//GESTION DES EVENEMENTS DYNAMIQUE DU FORMULAIRE DE CONTACT

import Formulaire from '../scripts/formulaire.js';

//on crée le formulaire
export const formulaire = new Formulaire("formulaire");


/* `formulaire.maskChamp('email');` is calling a method `maskChamp` on the `formulaire` object. This
method is used to apply a mask to the input field with the id 'email' in the form. A mask is a
pattern that restricts the input to a specific format, such as a phone number or email address. */
formulaire.maskChamp('societe');
formulaire.maskChamp('adress');
formulaire.maskChamp('thanks');
formulaire.maskChamp('fichier');


//addEventListener pour changer le comportement en fonction du radio coché
formulaire.getElement('particulier').addEventListener('change', () => { formulaire.hideChamp('societe') });
formulaire.getElement('professionnel').addEventListener('change', () => { formulaire.showChamp('societe') });

//adEventListener pour changer le comportement en fonction de l'objet
formulaire.getElement('objet').addEventListener('change', () => { formulaire.isSelected('objet', "demande_de_contact", () => formulaire.showChamp('email'), () => formulaire.hideChamp('email')); });
formulaire.getElement('objet').addEventListener('change', () => { formulaire.isSelected('objet', "envoi_d'une_brochure_tarifiaire", () => formulaire.showChamp('adress'), () => formulaire.hideChamp('adress')); });
formulaire.getElement('objet').addEventListener('change', () => { formulaire.isSelected('objet', "report_bug", () => formulaire.showChamp('thanks'), () => formulaire.hideChamp('thanks')); });
formulaire.getElement('objet').addEventListener('change', () => { formulaire.isSelected('objet', "offre_d'emploi", () => formulaire.showChamp('fichier'), () => formulaire.hideChamp('fichier')); });


// Réinitialise la valeur du champ pour permettre la sélection du même fichier
document.getElementById('fichier').addEventListener('click', function () {
    this.value = null;
});

//addEventListener pour gérer l'envoi du formulaire
formulaire.formulaireHtml.addEventListener('submit', (event) => {
    event.preventDefault();// empeche la soumission par défaut du formulaire.


    // Afficher une fenêtre de confirmation
    if (confirm('Voulez-vous vraiment envoyer ce formulaire?')) {
        // Si l'utilisateur confirme, attendre puis effectuez la redirection avec message de succès
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

        setTimeout(() => {
            //pour faire disparaitre auto
            successMessage.style.display = 'none';
            window.location.href = 'index.php';
        }, 2000);
    } else {
        // Si le formulaire n'est pas valide, affichez un message d'erreur
        alert('Veuillez remplir tous les champs requis.');
    }
});


