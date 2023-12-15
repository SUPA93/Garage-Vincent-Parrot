const maxLifetime = 60;
const sessionEndTime = sessionStartTime + maxLifetime;

function updateTimer() {
    const currentTime = Math.floor(Date.now() / 1000); // Temps actuel en secondes
    const timeLeft = sessionEndTime - currentTime; // Temps restant en secondes

    if (timeLeft >= 0) {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        // Affichage du temps restant
        document.getElementById('sessionTimer').textContent = minutes + " minutes, " + seconds + " secondes restantes";
    } else {
        document.getElementById('sessionTimer').textContent = "Session expirée";
        window.location.href = '../../templates/logout.php';
    }
}

// Mise à jour du timer toutes les secondes
setInterval(updateTimer, 1000);

