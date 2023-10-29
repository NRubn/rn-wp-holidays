console.log('Let it Snow! - By Ruben Norgall / %cwww.ruben-norgall.de');

const snowscreen = document.createElement('div');
snowscreen.id = 'snowscreen';
snowscreen.style.position = 'fixed';
snowscreen.style.top = '0';
snowscreen.style.left = '0';
snowscreen.style.width = '100%';
snowscreen.style.height = '100vh'; 
snowscreen.style.pointerEvents = 'none';
/*
    snowflake.style.width = '11px';
    snowflake.style.height = '12px';
*/

// Füge das "snowscreen"-Element dem Body hinzu
document.body.appendChild(snowscreen);

// Schneeflocken-Funktion
function createSnowflake() {
    const snowflake = document.createElement('div');
    snowflake.classList.add('snowflake');
    snowflake.style.left = Math.random() * window.innerWidth + 'px';
    snowscreen.appendChild(snowflake);

    const animationDuration = Math.random() * 3 + 5; // Zufällige Dauer für den Fall
    const driftDistance = window.innerHeight;
    snowflake.style.transition = `top ${animationDuration}s linear`;

    // Startposition
    snowflake.style.top = '-10px';
    const size = (Math.random() * 10 );
    snowflake.style.width = size + 'px';;
    snowflake.style.height = size + 'px';;

    // Beim Abschluss der Animation
    snowflake.addEventListener('transitionend', () => {
        snowscreen.removeChild(snowflake);
    });

    // Bewegung der Schneeflocke
    requestAnimationFrame(() => {
        snowflake.style.top = driftDistance + 'px';
    });
}

// Beispielaufruf für das Erstellen der Schneeflocken
createSnowflake();

function generateSnowflakes() {
    setInterval(createSnowflake, 500); // Neuer Schneeflocke alle 0.5 Sekunden erstellen
}

generateSnowflakes();