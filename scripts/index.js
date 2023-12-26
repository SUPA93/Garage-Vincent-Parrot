//SCRIPT POUR BOUTON BURGER
//cible la navbar => nav
const links = document.querySelectorAll('nav li');
// listen onclick
icons.addEventListener("click", () => {
    //change on digit class 
    nav.classList.toggle("digit");
})

links.forEach((link) => {
    link.addEventListener("click", () => {
        nav.classList.remove("digit");
    });
});

