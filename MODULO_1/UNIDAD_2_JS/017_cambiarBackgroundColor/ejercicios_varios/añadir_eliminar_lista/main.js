// Esperamos a que el DOM esté cargado
document.addEventListener("DOMContentLoaded", function () {
    const inputTarea = document.getElementById("tareaInput");
    const btnAgregar = document.getElementById("agregarTarea");
    const listaTareas = document.getElementById("listaTareas");

    // Evento para agregar tareas
    btnAgregar.addEventListener("click", function () {
        let nombreTarea = inputTarea.value.trim();

        // Validamos que el input no esté vacío
        if (nombreTarea === "") {
            alert("⚠️ Debes escribir una tarea.");
            return;
        }

        // Creamos el elemento <li>
        let li = document.createElement("li");
        li.textContent = nombreTarea;

        // Creamos el botón "X"
        let botonX = document.createElement("div");
        botonX.textContent = "X";
        botonX.classList.add("delete-btn");

        // Agregamos el botón "X" al <li>
        li.appendChild(botonX);

        // Agregamos la tarea a la lista
        listaTareas.appendChild(li);

        // Limpiamos el input
        inputTarea.value = "";
    });

    // Evento para eliminar tareas (comentado para pruebas)
    listaTareas.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-btn")) {
            e.target.parentElement.remove(); // Elimina el elemento padre (tarea completa)
        }
    });
});
