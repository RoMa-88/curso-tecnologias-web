// 🎨 Configuración del número de estrellas
const MAX_STARS = window.innerWidth > 768 ? 150 : 75; // 150 en PC, 75 en móviles
const MAX_SHOOTING_STARS = 3; // Máximo de estrellas fugaces activas

// 🔄 Crear el Canvas
const canvas = document.createElement("canvas");
document.body.appendChild(canvas);
const ctx = canvas.getContext("2d");

// 📏 Ajustar tamaño del canvas
const resizeCanvas = () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
};
window.addEventListener("resize", resizeCanvas);
resizeCanvas();

// 🌟 Generar Estrellas Aleatorias
const stars = [];
for (let i = 0; i < MAX_STARS; i++) {
    stars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        radius: Math.random() * 2,
        color: `rgba(255, 255, 255, ${Math.random()})`,
    });
}

// 💫 Generar Estrellas Fugaces
const shootingStars = [];
const generateShootingStar = () => {
    if (shootingStars.length >= MAX_SHOOTING_STARS) return;
    shootingStars.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height / 2, // Solo en la mitad superior
        speedX: Math.random() * 3 + 2,
        speedY: Math.random() * 1 + 1,
        opacity: 1,
    });
};

// 🎥 Animación
const animateStars = () => {
    // 🌌 Dibujar fondo oscuro antes de las estrellas
    ctx.fillStyle = "#020d18"; // Azul oscuro espacial
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // 🌟 Dibujar estrellas fijas
    stars.forEach(star => {
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
        ctx.fillStyle = star.color;
        ctx.fill();
    });

    // 💫 Dibujar estrellas fugaces
    for (let i = 0; i < shootingStars.length; i++) {
        let star = shootingStars[i];
        ctx.beginPath();
        ctx.moveTo(star.x, star.y);
        ctx.lineTo(star.x - 20, star.y + 20);
        ctx.strokeStyle = `rgba(255, 255, 255, ${star.opacity})`;
        ctx.lineWidth = 2;
        ctx.stroke();

        // Movimiento
        star.x += star.speedX;
        star.y += star.speedY;
        star.opacity -= 0.01;

        // Eliminar estrella cuando desaparezca
        if (star.opacity <= 0) {
            shootingStars.splice(i, 1);
        }
    }

    requestAnimationFrame(animateStars);
};

// 🚀 Iniciar animación y generación de estrellas fugaces
animateStars();
setInterval(generateShootingStar, 4000); // Genera una estrella fugaz cada 4s
