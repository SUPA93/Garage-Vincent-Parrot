//BUTTON BURGER SCRIPT
// NAV BAR
const links = document.querySelectorAll('nav ul');
// listen onclick
icons.addEventListener("click", () => {
    //change nav's class on click 
    nav.classList.toggle("digit");
})
//remove nav modal on link click
links.forEach((link) => {
    link.addEventListener("click", () => {
        nav.classList.remove("digit");
    });
});
// hide nav modal if scroll
window.addEventListener("scroll", () => {

    nav.classList.remove("digit");
}); 