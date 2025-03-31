<?php
// welcome.php
// Rep la petició POST i utilitza process_form.php per validar les dades.
// Després, mostra els resultats o un missatge d'error.

require_once 'process_form.php'; // Importem la funció processForm()

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = processForm($_POST); // Cridem la funció que processa el formulari

    if ($result['status'] === true) {
        echo "Nom: " . $result['name'] . "<br>";
        echo "Correu electrònic: " . $result['email'] . "<br>";
    } else {
        echo $result['message'];
        http_response_code(400);
    }
} else {
    echo "Si us plau, omple el formulari primer.";
}
