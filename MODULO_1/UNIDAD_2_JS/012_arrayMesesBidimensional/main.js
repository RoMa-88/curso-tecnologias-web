// main.js
function obtenerMes() {
    const meses = [
        ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre']
    ];

    // Pedir el idioma (0 para castellano, 1 para catalán)
    let idioma = prompt('Elige el idioma (0 para castellano, 1 para catalán):');
    idioma = parseInt(idioma, 10);

    if (isNaN(idioma) || idioma < 0 || idioma > 1) {
        alert('Por favor, introduce un número válido (0 o 1) para el idioma.');
        return;
    }

    // Pedir el número del mes
    let numeroMes = prompt('Introduce el número del mes (1-12):');
    numeroMes = parseInt(numeroMes, 10);

    if (isNaN(numeroMes) || numeroMes < 1 || numeroMes > 12) {
        alert('Por favor, introduce un número válido entre 1 y 12 para el mes.');
        return;
    }

    // Obtener el nombre del mes en el idioma seleccionado
    const nombreMes = meses[idioma][numeroMes - 1];
    window.location.reload(`El mes es: ${nombreMes}`);
}

// Ejecutar la función directamente
obtenerMes();