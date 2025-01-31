// Seleccionar elementos
const hamMenu = document.querySelector(".ham-menu");
const offScreenMenu = document.querySelector(".off-screen-menu");

if (hamMenu && offScreenMenu) {
    // Manejar clic en el menú hamburguesa
    hamMenu.addEventListener("click", () => {
        hamMenu.classList.toggle("active");
        offScreenMenu.classList.toggle("active");
    });
}

// Mantener funcionalidad del fondo estrellado
const COLORS = ["#fff2", "#fff4", "#fff7", "#fffc"];

const generateSpaceLayer = (size, selector, totalStars, duration) => {
    const container = document.querySelector(selector);
    if (!container) {
        console.error(`Elemento no encontrado: ${selector}`);
        return;
    }
    const layer = [];
    for (let i = 0; i < totalStars; i++) {
        const color = COLORS[Math.floor(Math.random() * COLORS.length)];
        const x = Math.floor(Math.random() * 100);
        const y = Math.floor(Math.random() * 100);
        layer.push(`${x}vw ${y}vh 0 ${color}, ${x}vw ${y + 100}vh 0 ${color}`);
    }
    container.style.setProperty("--size", size);
    container.style.setProperty("--duration", duration);
    container.style.setProperty("--space-layer", layer.join(","));
};

generateSpaceLayer("2px", ".space-1", 250, "25s");
generateSpaceLayer("3px", ".space-2", 100, "20s");
generateSpaceLayer("6px", ".space-3", 25, "15s");

const generateShootingStars = () => {
    const container = document.querySelector(".shooting-stars");
    if (!container) {
        console.error("Elemento no encontrado: .shooting-stars");
        return;
    }
    const shootingStars = [];
    for (let i = 0; i < 5; i++) {
        const x = Math.floor(Math.random() * 100);
        const y = Math.floor(Math.random() * 100);
        shootingStars.push(`${x}vw ${y}vh 0 #fff`);
    }
    container.style.setProperty("--shooting-stars-layer", shootingStars.join(","));
};

setInterval(generateShootingStars, 5000);


