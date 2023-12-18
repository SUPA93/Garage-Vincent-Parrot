const maxLifetime = 3600; // MUST BE SAME AS PHP FUNCTION 
let sessionEndTime;

if (sessionStartTime !== null) {
    sessionEndTime = sessionStartTime + maxLifetime;
    setInterval(updateTimer, 1000);
}

function updateTimer() {
    const currentTime = Math.floor(Date.now() / 1000);
    const timeLeft = sessionEndTime - currentTime;

    if (timeLeft >= 0) {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        document.getElementById('sessionTimer').textContent = minutes + " minutes, " + seconds + " secondes restantes";
    } else {
        document.getElementById('sessionTimer').textContent = "Session expirée";
        window.location.href = '../../templates/logout.php';
    }
}

console.log("Session Start Time: ", sessionStartTime);
console.log("Session End Time: ", sessionEndTime);
