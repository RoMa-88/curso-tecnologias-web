<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>

<!-- Ejercicio 4:
 Crear un array con nombres de personas.

Recorrer el array con un bucle foreach.

Mostrar un mensaje personalizado sólo a cada persona cuyo nombre empieza por “P”.


Debemos utilizar forEach, selector de array, if, strtolower(string) y sin usar str_starts_with(‘p’) sino string[0]

Array

$colores = array("rojo", "verde", "azul")
$colores[0]; // rojo
-->

    <?php

        //parte 1
        $personas = array("pedro", "jose", "luis", "pablo");
        echo "<h2>Buscando Personas con letra ''p'':</h2>";
    
        foreach ($personas as $persona) {
            // Convertimos la primera letra a minúscula para la comparación
            if (strtolower($persona[0]) == "p") {
                // Mostramos el nombre con la primera letra en mayúscula
                echo "<h1>Hola, " . ucfirst($persona) . "</h1>";
            }
        }
    
        // array de colores 
        $colores = array("rojo", "verde", "azul");

        echo "<h2>Primer color en la lista:</h2>";

        echo $colores[0]; // rojo
    
    ?>
</body>
</html>