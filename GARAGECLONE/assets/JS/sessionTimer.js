const maxLifetime = 6000; // MUST BE SAME AS PHP FUNCTION 
const sessionEndTime = sessionStartTime + maxLifetime;

function updateTimer() {
    const currentTime = Math.floor(Date.now() / 1000); // CURRENT TIME
    const timeLeft = sessionEndTime - currentTime; // TIME LEFT

    if (timeLeft >= 0) {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        // DISPLAY TIME LEFT
        document.getElementById('sessionTimer').textContent = minutes + " minutes, " + seconds + " secondes restantes";
    } else {
        document.getElementById('sessionTimer').textContent = "Session expirée";
        window.location.href = '../../templates/logout.php';
    }
}

// 1 SECONDE INTERVAL
setInterval(updateTimer, 1000);

