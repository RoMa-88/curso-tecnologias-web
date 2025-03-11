// 📌 Seleccionem els elements necessaris del DOM
const formulario = document.querySelector("#form");
const aside = document.querySelector("#barraLateral");
const container = document.getElementById("divcontenedor");
const inputTarea = document.getElementById("inputTarea");
const anadirTareaBtn = document.querySelector('#añadirTareaBtn');
const lista = document.querySelector('#listaTareas');
const tituloLista = document.querySelector("#divcontenedor h2"); // Selecciona el título de la lista de tareas

// Amaguem el contenidor de tasques inicialment fins que l'usuari sigui validat
container.style.display = "none";

// 📝 Gestió de l'esdeveniment 'submit' del formulari
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
        alert("No pots ser del futur, amic!");
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
        alert("Has de ser major d'edat!");
        return;
    }

    // ✅ Guardem les dades a sessionStorage perquè es mantinguin durant la sessió
    sessionStorage.setItem("nombreUsuario", nombreUsuario);
    sessionStorage.setItem("fechaNacimiento", fechaNacimiento);
    sessionStorage.setItem("estudios", estudios);
    sessionStorage.setItem("edad", edad);

    // ✅ Mostrem les dades de l'usuari al lateral
    aside.innerHTML = `
        <h2>📜 Dades de registre:</h2>
        <p><strong>Nom:</strong> ${nombreUsuario}</p>
        <p><strong>Data de Naixement:</strong> ${fechaNacimiento}</p>
        <p><strong>Estudis:</strong> ${estudios}</p>
        <p><strong>Edat:</strong> ${edad}</p>
    `;

    // 🔒 Amaguem el formulari
    formulario.style.display = "none";

    // ✨ Mostrem el contenidor de tasques després de la validació
    container.style.display = "block";

    // 🔹 Modifiquem el títol de la llista de tasques per afegir el nom de l'usuari
    tituloLista.innerHTML = `📌 Llista de tasques de ${nombreUsuario}`;
};

// 📝 Funció per afegir tasques a la llista
function anadirTareas() {
    let tarea = inputTarea.value.trim();

    if (!tarea) {
        alert("La tasca no pot estar buida.");
        return;
    }

    // 📌 Creamos el contenedor de la tarea
    let tareaContainer = document.createElement("div");
    tareaContainer.classList.add("tarea-item");

    // 📌 Creamos el elemento de la lista
    let elemenLista = document.createElement("span");
    elemenLista.textContent = tarea;

    // 📌 Creamos el botón de eliminar
    let deleteBtn = document.createElement("button");
    deleteBtn.classList.add("delete-btn");
    deleteBtn.innerHTML = "&times;";

    // 📌 Evento para eliminar la tarea
    deleteBtn.onclick = function () {
        tareaContainer.remove();
    };

    // 📌 Agregamos los elementos al contenedor de la tarea
    tareaContainer.appendChild(elemenLista);
    tareaContainer.appendChild(deleteBtn);

    // 📌 Agregamos la tarea a la lista
    lista.appendChild(tareaContainer);

    // 📌 Limpiamos el input después de añadir la tarea
    inputTarea.value = '';
}

// 🖱️ Afegim l'event al botó per afegir tasques
anadirTareaBtn.onclick = anadirTareas;

// 🚀 Recuperem les dades de sessionStorage quan es recarrega la pàgina
document.addEventListener("DOMContentLoaded", function () {
    let nombreGuardado = sessionStorage.getItem("nombreUsuario");

    if (nombreGuardado) {
        container.style.display = "block";
        tituloLista.innerHTML = `📌 Llista de tasques de ${nombreGuardado}`;
    }
});
