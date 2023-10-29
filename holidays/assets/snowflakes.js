function createSnowflake() {
    const snowflake = document.createElement('div');
    snowflake.classList.add('snowflake');
    snowflake.style.left = Math.random() * window.innerWidth + 'px';
    document.body.appendChild(snowflake);

    const animationDuration = Math.random() * 3 + 5; // Zufällige Dauer für den Fall
    const driftDistance = window.innerHeight - 20;
    snowflake.style.transition = `top ${animationDuration}s linear`;

    // Startposition
    snowflake.style.top = '-10px';

    // Beim Abschluss der Animation
    snowflake.addEventListener('transitionend', () => {
        document.body.removeChild(snowflake);
    });

    // Bewegung der Schneeflocke
    requestAnimationFrame(() => {
        snowflake.style.top = driftDistance + 'px';
    });
}

function generateSnowflakes() {
    setInterval(createSnowflake, 500); // Neuer Schneeflocke alle 0.5 Sekunden erstellen
}

generateSnowflakes();