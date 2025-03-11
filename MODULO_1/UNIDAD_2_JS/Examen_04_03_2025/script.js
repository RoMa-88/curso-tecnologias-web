// sleccionamos todos los elementos del DOM que necesitamos
const formulario = document.querySelector("#form");
const aside = document.querySelector("#barraLateral");
const container = document.getElementById("divcontenedor");
const inputPuesto = document.getElementById("inputPuesto");
const fechaInicio = document.getElementById("fechaInicio");
const fechaFin = document.getElementById("fechaFin");
const actualmenteTrabajando = document.getElementById("actualmenteTrabajando");
const anadirExperienciaBtn = document.querySelector('#añadirExperienciaBtn');
const listaExperiencia = document.querySelector('#listaExperiencia');
const tituloLista = document.querySelector("#divcontenedor h2");

// escondemos el contenedor de experiencia hasta que el usuario sea validado
container.style.display = "none";

//  evento 'submit' del formulario
formulario.onsubmit = function (e) {
    e.preventDefault();

    let nombreUsuario = document.querySelector("#nombreUsuario").value.trim();
    let fechaNacimiento = document.querySelector("#fechaNacimiento").value;
    let estudios = document.querySelector("#estudios").value;

    if (!nombreUsuario) {
        alert("Has d'introduir un nom d'usuari.");
        return;
    }

    const fechaNacimientoUsuario = new Date(fechaNacimiento);
    const fechaActual = new Date();

    if (fechaNacimientoUsuario > fechaActual) {
        alert("La fecha no puede ser futura, a no ser..., que tengas una máquina del tiempo!");
        return;
    }

    let edad = fechaActual.getFullYear() - fechaNacimientoUsuario.getFullYear();
    const mesNacimiento = fechaNacimientoUsuario.getMonth();
    const diaNacimiento = fechaNacimientoUsuario.getDate();
    const mesActual = fechaActual.getMonth();
    const diaActual = fechaActual.getDate();

    if (mesActual < mesNacimiento || (mesActual === mesNacimiento && diaActual < diaNacimiento)) {
        edad--;
    }

    if (edad < 18) {
        alert("Tienes que ser mayor de edad");
        return;
    }

    // guardar las datos en sessionStorage, como nos enseño luis
    sessionStorage.setItem("nombreUsuario", nombreUsuario);
    sessionStorage.setItem("fechaNacimiento", fechaNacimiento);
    sessionStorage.setItem("estudios", estudios);
    sessionStorage.setItem("edad", edad);

    // mostrar los datos del usuario en el aside
    aside.innerHTML = `
        <h2> Dades de registre:</h2>
        <p><strong>Nom:</strong> ${nombreUsuario}</p>
        <p><strong>Data de Naixement:</strong> ${fechaNacimiento}</p>
        <p><strong>Estudis:</strong> ${estudios}</p>
        <p><strong>Edat:</strong> ${edad}</p>
    `;

    // esconder  el formulario
    formulario.style.display = "none";

    // enseñamos el contenedor de experiencia después de la validación
    container.style.display = "block";

    // cambiamos el título para reflejar el nombre del usuario
    tituloLista.innerHTML = `Experiencia Laboral de ${nombreUsuario}`;
};

// function para agregar experiencias laborales
function anadirExperiencia() {
    let puesto = inputPuesto.value.trim();
    let inicio = fechaInicio.value;
    let fin = fechaFin.value;
    let sigueTrabajando = actualmenteTrabajando.checked;

    if (!puesto) {
        alert("El nombre del puesto no puede estar vacío.");
        return;
    }

    if (!inicio) {
        alert("Debes seleccionar una fecha de inicio.");
        return;
    }

    if (!sigueTrabajando && !fin) {
        alert("Debes seleccionar una fecha de finalización o marcar que actualmente trabajas aquí.");
        return;
    }

    if (!sigueTrabajando && new Date(inicio) > new Date(fin)) {
        alert("La fecha de inicio no puede ser posterior a la fecha de finalización.");
        return;
    }

    // creamos el contenedor de la experiencia laboral
    let experienciaContainer = document.createElement("div");
    experienciaContainer.classList.add("experiencia-item");

    // creamos el contenido de la experiencia
    let detalleExperiencia = document.createElement("span");
    detalleExperiencia.innerHTML = `${puesto} - ${inicio} ${sigueTrabajando ? "(Actualmente trabajando aquí)" : `a ${fin}`}`;

    // aqui hacemos el  botón para eliminar
    let deleteBtn = document.createElement("button");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.innerHTML = "&times;";

    // event para eliminar la experiencia
    deleteBtn.onclick = function () {
        experienciaContainer.remove();
    };

    // ponemos los elementos al contenedor de experiencia
    experienciaContainer.appendChild(detalleExperiencia);
    experienciaContainer.appendChild(deleteBtn);

    // añadimos la experiencia a la lista
    listaExperiencia.appendChild(experienciaContainer);

    // limpiamos los campos después de añadir la experiencia
    inputPuesto.value = '';
    fechaInicio.value = '';
    fechaFin.value = '';
    actualmenteTrabajando.checked = false;
}

// evento para añadir xperiencia
anadirExperienciaBtn.onclick = anadirExperiencia;

// recuperamos los datos de sessionStorage cuando se recarga la página
document.addEventListener("DOMContentLoaded", function () {
    let nombreGuardado = sessionStorage.getItem("nombreUsuario");

    if (nombreGuardado) {
        container.style.display = "block";
        tituloLista.innerHTML = `Experiencia Laboral de ${nombreGuardado}`;
    }
});
