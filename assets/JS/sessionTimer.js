const maxLifetime = 3600; // VALUES AS PHP CONNEXIONS FUNCTION
let timeout;
let sessionEndTime;

function resetTimer() {
    clearTimeout(timeout);
    sessionEndTime = Math.floor(Date.now() / 1000) + maxLifetime; // UPADATE END TIME STAMP
    timeout = setTimeout(logout, maxLifetime * 1000);
    /* console.log("Session Start Time: ", new Date(sessionStartTime * 1000).toLocaleString());
    console.log("Session End Time: ", new Date(sessionEndTime * 1000).toLocaleString()); */
}

function logout() {
    window.location.href = '../../templates/logout.php';
}

// RESET TIMER ON EVENT
window.onload = resetTimer;
window.onmousemove = resetTimer; // MOUSE EVENTS
window.onmousedown = resetTimer; // ONCLICK
window.onclick = resetTimer;     // ONCLICK
window.onscroll = resetTimer;    // ON MOUSE SCROLL
window.onkeydown = resetTimer;   // ON KEY HIT

resetTimer(); // INITIATE TIMER
