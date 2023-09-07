import Formulaire from '../scripts/formulaire.js';

//on crée le formulaire

export const formulaire = new Formulaire("formulaire");

formulaire.maskChamp('societe');

/* `formulaire.maskChamp('email');` is calling a method `maskChamp` on the `formulaire` object. This
method is used to apply a mask to the input field with the id 'email' in the form. A mask is a
pattern that restricts the input to a specific format, such as a phone number or email address. */

formulaire.maskChamp('adress');
formulaire.maskChamp('thanks');


//addEventListener pour changer le comportement en fonction du radio coché

formulaire.getElement('particulier').addEventListener('change', () => {formulaire.hideChamp('societe')});

formulaire.getElement('professionnel').addEventListener('change', () => {formulaire.showChamp('societe')});

//adEventListener pour changer le comportement en fonction de l'objet

formulaire.getElement('objet').addEventListener('change', ()  => {formulaire.isSelected('objet', "demande_de_contact", () => formulaire.showChamp('email'), () => formulaire.hideChamp('email'));});
formulaire.getElement('objet').addEventListener('change', ()  => {formulaire.isSelected('objet', "envoi_d'une_brochure_tarifiaire", () => formulaire.showChamp('adress'), () => formulaire.hideChamp('adress'));});
formulaire.getElement('objet').addEventListener('change', ()  => {formulaire.isSelected('objet', "report_bug", () => formulaire.showChamp('thanks'), () => formulaire.hideChamp('thanks'));});

//addEventListener pour récupérer les données du formulaire

formulaire.formulaireHtml.addEventListener('submit',
    (event) => {
        event.preventDefault();
        formulaire.affAnswers();
        /* console.log(formulaire.answers) */
    }
);

//cible la navbar => nav
const links = document.querySelectorAll('nav li');

icons.addEventListener("click", () => {
    nav.classList.toggle("digit");
})

links.forEach((link) => {
    link.addEventListener("click", () => {
        nav.classList.remove("digit");
    });
});

