let currentSlideIndex = 0;
const avisCartes = document.querySelectorAll('.avis-carte');
const totalSlides = avisCartes.length;
const slideWidth = avisCartes[0].offsetWidth + 20; 

function showSlide(index) {
    const offset = -index * slideWidth;
    document.querySelector('.carousel').style.transform = `translateX(${offset}px)`;
}

function nextSlide() {
    currentSlideIndex++;
    if (currentSlideIndex >= totalSlides) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
}

function autoSlide() {
    nextSlide();
    setTimeout(autoSlide, 3000); // Change d'avis toutes les 3 secondes
}

showSlide(currentSlideIndex);
autoSlide(); // Démarre le défilement automatique
