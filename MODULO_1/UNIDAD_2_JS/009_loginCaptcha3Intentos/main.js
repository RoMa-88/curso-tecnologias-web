
const resultadoCorrecto = 5 + 9; // El resultado correcto de la suma
const maxIntentos = 3; // Número máximo de intentos permitidos

let intentos = 0; // Contador de intentos
let respuestaUsuario; // Variable para almacenar la respuesta del usuario
let accesoPermitido = false; // Bandera para controlar si el usuario accedió correctamente

// Bucle do-while para permitir múltiples intentos
do {
    // Pedimos al usuario que resuelva la suma
    respuestaUsuario = parseInt(prompt("Comprobemos que eres humano. Introduce el resultado de 5 + 9:"));

    if (respuestaUsuario === resultadoCorrecto) {
        alert("Resultado correcto. Bienvenido!");
        accesoPermitido = true; // Marcamos que el acceso está permitido
    } else {
        intentos++; // Incrementamos el contador de intentos
        if (intentos < maxIntentos) {
            alert(`Incorrecto. Te quedan ${maxIntentos - intentos} intentos.`);
        } else {
            alert("Has agotado tus 3 intentos. Redireccionando a los Mossos...");
            window.location.href = "https://mossos.gencat.cat/ca/inici"; // Redirección
        }
    }
} while (!accesoPermitido && intentos < maxIntentos); // Continúa mientras no se haya accedido y queden intentos
