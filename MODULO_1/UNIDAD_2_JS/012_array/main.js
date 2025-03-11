// main.js
function obtenerMes() {
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    const input = prompt('Introduce el número del mes (1-12):');
    const numeroMes = parseInt(input, 10);

    if (isNaN(numeroMes) || numeroMes < 1 || numeroMes > 12) {
        alert('Por favor, introduce un número válido entre 1 y 12.');
        return;
    }

    const nombreMes = meses[numeroMes - 1];
    window.location.reload(`El mes es: ${nombreMes}`);
}


obtenerMes();