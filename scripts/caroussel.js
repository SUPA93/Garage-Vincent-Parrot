let carousel = document.querySelector('.carousel');
let moving = false;  

function moveCarousel() {
    if (moving) return;  

    let firstChild = carousel.firstElementChild;
    let width = firstChild.clientWidth + 20;  // ne pas oublier de changer la taille du gap

    moving = true;  // transition en cours
    carousel.style.transition = 'transform 3s linear';//correspond au CSS
    carousel.style.transform = `translateX(-${width}px)`;

    // fonction appelée une fois la transition terminée
    carousel.addEventListener('transitionend', function () {
        carousel.style.transition = 'none';  // désactive 
        carousel.style.transform = 'translateX(0)';  // remet à zéro 
        carousel.removeChild(firstChild);  // supprime la première carte
        carousel.appendChild(firstChild);  // ajoute la première carte à la fin du carrousel
        moving = false;  // transition terminée

        requestAnimationFrame(moveCarousel);  // prochain déplacement
    }, { once: true });  // écouteur d'événement exécuté une seule fois
}

// appel
moveCarousel();
