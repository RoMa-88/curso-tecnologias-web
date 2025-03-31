<?php
// functions.php
// Aquí definim funcions auxiliars de suport,
// com per exemple, una funció per validar i netejar les dades.

// Funció que valida i neteja la cadena rebuda
function validateInput($data) {
    // Eliminar espais en blanc al principi i al final
    $data = trim($data);
    // Convertir caràcters especials en entitats HTML
    // per evitar problemes de seguretat (XSS) i mostrar-los correctament
    $data = htmlspecialchars($data);
    return $data;
}