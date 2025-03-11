// Esperem que el DOM estigui carregat abans d'executar el codi
document.addEventListener("DOMContentLoaded", function () {
    // Preguntem al usuari què vol sortejar
    let tipoSorteo = prompt("🎉 ¿Qué quieres sortear? (Ejemplo: un premio, una entrada, un regalo)").trim();

    // Si no ingresa nada, establecemos un valor por defecto
    if (!tipoSorteo) {
        tipoSorteo = "Premio";
    }

    // Actualitzem el títol del sorteig amb el tipus indicat
    document.getElementById("tituloSorteo").textContent = `Sorteo de ${tipoSorteo}`;

    // Obtenim elements del DOM
    const formulario = document.querySelector('#form');
    const campoNombre = document.querySelector('#name');
    const listaConcursantes = document.querySelector('#listaConcursantes');
    const botonSortear = document.querySelector('#sortear');

    // Array per emmagatzemar els concursants
    let concursantes = [];

    // Event per afegir concursants
    formulario.addEventListener("submit", function (e) {
        e.preventDefault(); // Evitem que la pàgina es recarregui

        let nombreConcursante = campoNombre.value.trim(); // Eliminem espais en blanc

        // Validació: comprovar que el camp no estigui buit i que no estigui repetit
        if (nombreConcursante === "") {
            alert("⚠️ El camp no pot estar buit.");
            return;
        }
        if (concursantes.includes(nombreConcursante)) {
            alert("⚠️ Aquest nom ja està registrat.");
            return;
        }

        // Afegim el nom a l'array de concursants
        concursantes.push(nombreConcursante);

        // Creem un nou element <li> per la llista
        let li = document.createElement("li");
        li.textContent = nombreConcursante;
        li.setAttribute("id", nombreConcursante); // Afegim ID per identificar guanyador
        listaConcursantes.appendChild(li);

        // Netejem el camp de text
        campoNombre.value = "";

        // Mostrem l'array per consola (només per verificació)
        console.log(concursantes);
    });

    // Event per realitzar el sorteig
    botonSortear.addEventListener("click", function () {
        if (concursantes.length === 0) {
            alert("⚠️ No hi ha concursants per sortejar.");
            return;
        }

        // Seleccionem un guanyador aleatori
        let numLista = Math.floor(Math.random() * concursantes.length);
        let ganador = concursantes[numLista];

        // Eliminem qualsevol guanyador anterior (neteja estils)
        document.querySelectorAll("li").forEach(li => li.classList.remove("ganador"));

        // Afegim la classe guanyador al li corresponent
        let liGanador = document.getElementById(ganador);
        if (liGanador) {
            liGanador.classList.add("ganador");
            liGanador.textContent += " 🏆";
        }

        alert(`🎉 El guanyador és: ${ganador} 🎉`);
    });
});
