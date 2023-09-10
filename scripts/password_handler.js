
document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const passwordMessage = document.getElementById("passwordMessage");

    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;

        // Utilisez des expressions régulières pour valider le mot de passe
        const uppercaseRegex = /[A-Z]/;
        const digitRegex = /[0-9]/;
        const specialCharRegex = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/;
        const minLength = 8;

        const isUppercase = uppercaseRegex.test(password);
        const isDigit = digitRegex.test(password);
        const isSpecialChar = specialCharRegex.test(password);
        const isMinLength = password.length >= minLength;

        if (isUppercase && isDigit && isSpecialChar && isMinLength) {
            passwordMessage.textContent = "✔ Mot de passe valide";
            passwordMessage.style.color = "black";
        } else {
            passwordMessage.textContent = "🚨Le mot de passe doit contenir au moins une majuscule, un chiffre, un caractère spécial et avoir une longueur minimale de 8 caractères.";
            passwordMessage.style.color = "red";
        }
    });
});

