document.addEventListener("DOMContentLoaded", function () {
    const inputTarea = document.getElementById("tareaInput");
    const btnAgregar = document.getElementById("agregarTarea");
    const listaTareas = document.getElementById("listaTareas");

    btnAgregar.addEventListener("click", function () {
        let nombreTarea = inputTarea.value.trim();
        if (nombreTarea === "") {
            alert("⚠️ Debes escribir una tarea.");
            return;
        }

        let li = document.createElement("li");
        li.textContent = nombreTarea;

        let btnEditar = document.createElement("div");
        btnEditar.textContent = "✏️";
        btnEditar.classList.add("edit-btn");
        btnEditar.addEventListener("click", function () {
            let nuevoTexto = prompt("Edita la tarea:", nombreTarea);
            if (nuevoTexto !== null && nuevoTexto.trim() !== "") {
                li.firstChild.textContent = nuevoTexto;
            }
        });

        let btnSubtarea = document.createElement("div");
        btnSubtarea.textContent = "+";
        btnSubtarea.classList.add("subtask-btn");
        btnSubtarea.addEventListener("click", function () {
            let subtareaTexto = prompt("Introduce la subtarea:");
            if (subtareaTexto && subtareaTexto.trim() !== "") {
                let subLi = document.createElement("li");
                subLi.textContent = "- " + subtareaTexto;
                subLi.classList.add("subtask-item");
                li.appendChild(subLi);
            }
        });

        let btnEliminar = document.createElement("div");
        btnEliminar.textContent = "X";
        btnEliminar.classList.add("delete-btn");
        btnEliminar.addEventListener("click", function () {
            li.remove();
        });

        let btnContainer = document.createElement("div");
        btnContainer.classList.add("btn-container");
        btnContainer.appendChild(btnEditar);
        btnContainer.appendChild(btnSubtarea);
        btnContainer.appendChild(btnEliminar);

        li.appendChild(btnContainer);
        listaTareas.appendChild(li);

        inputTarea.value = "";
    });
});