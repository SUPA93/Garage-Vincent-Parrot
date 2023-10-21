document.addEventListener('DOMContentLoaded', function () {
    // Récupérez les éléments du formulaire par leurs IDs
    var firstNameLabel = document.getElementById("firstNameLabel");
    var firstNameInput = document.getElementById("firstNameInput");

    var familyNameLabel = document.getElementById("familyNameLabel");
    var familyNameInput = document.getElementById("familyNameInput");

    var userMessageLabel = document.getElementById("userMessageLabel");
    var userMessageInput = document.getElementById("userMessageInput");

    var userRatingLabel = document.getElementById("userRatingLabel");
    var userRatingSelect = document.getElementById("userRating");

    var sendFeedbackButton = document.getElementsByName("send_feedback")[0];

    var showFormButton = document.getElementById("showFormButton");

    var hideFormButton = document.getElementById("hideFormButton");
    // Cachez les éléments du formulaire initialement
    firstNameLabel.style.display = "none";
    firstNameInput.style.display = "none";

    familyNameLabel.style.display = "none";
    familyNameInput.style.display = "none";

    userMessageLabel.style.display = "none";
    userMessageInput.style.display = "none";

    userRatingLabel.style.display = "none";
    userRatingSelect.style.display = "none";

    sendFeedbackButton.style.display = "none";
    hideFormButton.style.display = "none";
    // Ajoutez un gestionnaire d'événements sur le bouton "show_form"
    showFormButton.addEventListener("click", function () {
        // Affichez les éléments du formulaire lorsque le bouton "show_form" est cliqué
        firstNameLabel.style.display = "block";
        firstNameInput.style.display = "block";

        familyNameLabel.style.display = "block";
        familyNameInput.style.display = "block";

        familyNameLabel.style.display = "block";
        userMessageInput.style.display = "block";

        userMessageLabel.style.display = "block";
        userRatingSelect.style.display = "block";

        sendFeedbackButton.style.display = "block";
        hideFormButton.style.display = "block";
        // Cachez le bouton "show_form"
        showFormButton.style.display = "none";
        window.location.hash = "#feedbackSection";
    });

    hideFormButton.addEventListener("click", function () {
        firstNameLabel.style.display = "none";
        firstNameInput.style.display = "none";

        familyNameLabel.style.display = "none";
        familyNameInput.style.display = "none";

        userMessageLabel.style.display = "none";
        userMessageInput.style.display = "none";

        userRatingLabel.style.display = "none";
        userRatingSelect.style.display = "none";

        sendFeedbackButton.style.display = "none";
        hideFormButton.style.display = "none";

        showFormButton.style.display = "block";
        window.scrollTo(0, 0);
    });
});