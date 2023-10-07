let carousel = document.querySelector('.carousel');
let moving = false;  // pour savoir si une transition est en cours

function moveCarousel() {
    if (moving) return;  // s'il y a une transition en cours, ne faites rien

    let firstChild = carousel.firstElementChild;
    let width = firstChild.clientWidth + 20;  // ajoutez l'écart entre les cartes

    moving = true;  // indique qu'une transition est en cours
    carousel.style.transition = 'transform 3s linear';
    carousel.style.transform = `translateX(-${width}px)`;

    // Cette fonction sera appelée une fois la transition terminée
    carousel.addEventListener('transitionend', function () {
        carousel.style.transition = 'none';  // désactive la transition
        carousel.style.transform = 'translateX(0)';  // remet à zéro la position du carrousel sans transition
        carousel.removeChild(firstChild);  // supprime la première carte
        carousel.appendChild(firstChild);  // ajoute la carte à la fin du carrousel
        moving = false;  // indique que la transition est terminée

        requestAnimationFrame(moveCarousel);  // planifie le prochain déplacement
    }, { once: true });  // garantit que cet écouteur d'événement est exécuté une seule fois
}

// Commencez le défilement
moveCarousel();
