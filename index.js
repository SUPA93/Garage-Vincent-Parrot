//cible la navbar => nav
const links = document.querySelectorAll('nav li');

icons.addEventListener("click", () => {
    nav.classList.toggle("digit");
})

links.forEach((link) => {
    link.addEventListener('click', () => {
        nav.classList.remove("digit");
    });
});