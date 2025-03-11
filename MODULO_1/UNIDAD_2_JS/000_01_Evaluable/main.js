//esta funcion sumaria todas las notas, y dividiria el lenght(la longitud de notas, cuantas notas hemos introducido)
//con la suma de estas, retornara el resultadode la media de todas las notas
function calcularMedia(notas) {
    let suma = 0;
    for (let i = 0; i < notas.length; i++) {
        suma += notas[i];
    } return suma / notas.length;
}

//función para pasar la nota numérica a nomenclatura
function determinarCalificacion(media) {
    if (media >= 0 && media <= 4.99) {
        return "Suspenso";
    } else if (media >= 5 && media <= 5.99) {
        return "Suficiente";
    } else if (media >= 6 && media <= 6.99) {
        return "Bien";
    } else if (media >= 7 && media <= 7.99) {
        return "Notable";
    } else if (media >= 8 && media <= 10) {
        return "Sobresaliente";
    } else {
        return "Entrada no válida!";
    }

}

/*pruebas de la funciones con datos precargados en el array*/
/*let notas = [8.5, 7.39, 6.8, 9, 7.5];
console.log(calcularMedia(notas));
console.log(calcularMedia(notas).toFixed(2));

console.log(determinarCalificacion(calcularMedia(notas).toFixed(2)));
console.log(determinarCalificacion(-1));
console.log(determinarCalificacion(3.59));*/


//solicitar el nombre del alumno
const nombreAlumno = prompt("Inserta el nombre del alumno:");

//el array para almacenar las notas
let notas = [];
for (let i = 1; i <= 5; i++) {
    let nota = parseFloat(prompt(`Inserta la nota ${i} (debe ser un número entre 0 y 10):`));

    // la validación completa;(nota) tiene que ser numero, y estar entre 0 y 10
    while (isNaN(nota) || nota < 0 || nota > 10) {
        alert("Por favor, introduce un número válido entre 0 y 10.");
        nota = parseFloat(prompt(`Inserta la nota ${i} (debe ser un número entre 0 y 10):`));
    }

    notas.push(nota); // insertaremos cada la nota (validada) al array
}

//calcuar media, mediante función
let media = calcularMedia(notas);

//mediante media, asignarle la calificación
let calificacionFinal = determinarCalificacion(media);

//mostrar los resultados de forma estilizada
document.write(`<h1><p>Nombre del alumno: ${nombreAlumno}</p></h1><hr>`);

// cambiar el estilo de cada nota con estilos según su valor
for (let i = 0; i < notas.length; i++) {
    let notaClass; // variable para almacenar la clase CSS

    // y utilizamos if-else para determinar a la clase CSS que pertenecera
    if (notas[i] < 5) {
        notaClass = "nota-roja"; // las notas rojas, seran las que tengan un valor inferior a 5
    } else {
        notaClass = "nota-verde"; // las verdes para notas mayores o iguales a 5
    }

    document.write(
        `<p class="nota ${notaClass}">Nota ${i + 1}: ${notas[i].toFixed(2)}</p>`
    );
}

//ultima salida con la media y de la calificación con su nomenclatura
document.write(`<hr><br><h2><p>Media: ${media.toFixed(2)}</p></h2>`);
document.write(`<h2><p>Nota: ${calificacionFinal}</p></h2>`);
