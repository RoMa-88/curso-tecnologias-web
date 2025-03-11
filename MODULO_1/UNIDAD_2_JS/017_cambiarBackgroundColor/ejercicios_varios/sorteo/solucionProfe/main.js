// Obtenemos el objeto del formulario del DOM para capturar el evento de envío del formulario (submit)
const formulario = document.querySelector('#form');
// Obtenemos el campo input donde se ingresa el nombre del concursante
let campoNombre = document.querySelector('#nombre');
// Obtenemos del DOM el elemento lista <ul></ul> donde se escibirá la lista de concursantes
let listaConcursantes = document.querySelector('#listaConcursantes');
// Obtenemos el botón "sortear" para captar el click (evento onclick)
const botonSortear = document.querySelector('#sortear');
// Creamos un array donde guardaremos la lista de concursantes
let listaArray = [];

// Cuando se le da al botón del formulario
formulario.onsubmit = function(e){
    // Prevenimos que se envíe
    e.preventDefault();
    // Obtenemos el valor del campo  del nombre del concursante
    let nombreConcursante = campoNombre.value;

    // Comprobamos si se ha introducido correctamente
    // y que no está repetido con indexOf()
    if (nombreConcursante=='' || !nombreConcursante || listaArray.indexOf(nombreConcursante) != -1){
        // Si no está correcto alertamos
        alert('El campo está vacío, o el nombre está repetido')
        // Terminamos la función
        return;
    } 
    // Añadimos al array el nombre del nuevo concursante
    listaArray.push(nombreConcursante);
    // Y lo escribimos en la lista
    // Se añade un id al li igual que el nombre para cambiarle el color si es el ganador
    listaConcursantes.innerHTML +=  `<li id="${nombreConcursante}">${nombreConcursante}</li>`;
    // eliminamos el valor del input del formulario para vaciarlo
    campoNombre.value = '';
}

// Captamos el click del botón "sortear"
botonSortear.onclick = function(){
   // Realizamos el sorteo buscando el nº de orden en el array del ganador aleatoriamente
    let numLista = Math.floor(Math.random() * listaArray.length);
    //Cambiamos el color de fondo li del ganador 
    document.getElementById(listaArray[numLista]).style.backgroundColor = "yellow";
    document.getElementById(listaArray[numLista]).innerHTML += " - Ganador " + listaArray[numLista];
}
/*
Capturar evento del teclado
document.onkeyup = function(e){
    if (e.key === "Enter") botonSortear.click();
}*/