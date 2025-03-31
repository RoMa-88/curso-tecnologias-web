<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón de Asteriscos</title>
</head>
<body>
    
    <?php
    // Definimos la cantidad de filas que queremos en el patrón
    $filas = 4;

    // Bucle externo: controla cuántas líneas se imprimirán (de 4 a 1)
    for ($i = $filas; $i > 0; $i--) {
        
        // Bucle interno: imprime los asteriscos en cada línea
        for ($x = $i; $x > 0; $x--) {
            echo "*"; // Imprime un asterisco sin salto de línea
        }

        echo "<br>"; // Salto de línea después de cada fila de asteriscos
    }
    ?>

<?php
$laberinto = array(
           array("#", "#", "#", "#", "#"),
           array("#", ".", ".", ".", "#"),
           array("#", ".", "#", ".", "#"),
           array("#", ".", ".", ".", "#"),
           array("#", "#", "#", "#", "#")
       );

?>
    
</body>
</html>
