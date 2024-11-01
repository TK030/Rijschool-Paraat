let timeLeft = 5;
const timerElement = document.getElementById('timer');

const countdown = setInterval(() => {
    timeLeft--;
    timerElement.textContent = timeLeft;

    if (timeLeft <= 0) {
        clearInterval(countdown);
        window.location.href = 'index.html';
    }
}, 1000);