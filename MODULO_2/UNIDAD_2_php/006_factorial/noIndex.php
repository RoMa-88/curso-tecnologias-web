<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noFactorial</title>
</head>
<body>
<?php
// Función recursiva para calcular el factorial
function factorialRecursivo($num) {
    if ($num < 0) {
        return "El factorial de un número negativo no está definido.";
    }
    
    if ($num === 0 || $num === 1) {
        return 1; // Caso base: factorial de 0 y 1 es 1
    }
    
    return $num * factorialRecursivo($num - 1); // Llamada recursiva
}

// Prueba con un número
$numero = 5;
echo "El factorial de $numero con recursividad es: " . factorialRecursivo($numero);
?>

</body>
</html>