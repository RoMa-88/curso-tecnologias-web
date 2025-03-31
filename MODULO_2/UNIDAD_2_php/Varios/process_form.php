<?php
// process_form.php
// Aquest fitxer conté la lògica de validació i resposta
// de les dades del formulari.

require_once 'functions.php'; // Importem la funció validateInput()

// Funció principal per processar el formulari
function processForm($postData) {
    // Comprovem si 'name' i 'email' existeixen i no estan buits
    if (isset($postData['name']) && !empty($postData['name']) &&
        isset($postData['email']) && !empty($postData['email'])) {

        // Validem i netegem les dades abans de retornar-les
        // No usem '$data:' ni res semblant, només passem la variable
        $name = validateInput($postData['name']);
        $email = validateInput($postData['email']);

        // Retornem un array amb l'estat i les dades si tot va bé
        return [
            'status' => true,
            'name'   => $name,
            'email'  => $email
        ];
    } else {
        // Si falten dades o estan buides, retornem estat d'error
        return [
            'status'  => false,
            'message' => "Falten paràmetres"
        ];
    }
}
