const numCorrecto = 5 + 9; // El resultado correcto de la suma
let intentos = 0; // Contador de intentos
const maxIntentos = 3; // Número máximo de intentos permitidos

// Bucle para permitir múltiples intentos
while (intentos < maxIntentos) {
    let numUsuario = parseInt(prompt('Comprobemos que eres humano. Introduce la suma de 5 + 9'));

    if (numUsuario === numCorrecto) {
        document.write('Resultado Correcto, Bienvenido Usuario!!');
        break; // Salimos del bucle si la respuesta es correcta
    } else if (isNaN(numUsuario)) {
        alert('Debes introducir un número válido.');
    } else {
        alert(`El número ${numUsuario} no es correcto. Intenta nuevamente.`);
    }

    intentos++; // Incrementamos el contador de intentos
}

// Si se agotan los intentos, recargamos la página
if (intentos === maxIntentos) {
    alert('Has agotado todos tus intentos. Recargando la página...');
    window.location.reload();
}