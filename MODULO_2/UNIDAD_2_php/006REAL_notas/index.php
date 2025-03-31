<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Notas</title>
</head>
<body>
<!-- 006_ EJERCICIO
Escribe el código para obtener la siguiente información del array:


1. La edad de María.
2. La segunda nota de Carlos.
3. El nombre de todos los estudiantes.
4. La media de notas de Laura *

estudiantes[2][“notas”]


*Usar las funciones array_sum() y count()

$mediaLaura = array_sum($notasLaura) / count($notasLaura);

-->
    
<?php 

$estudiantes = array(
    array(
        "nombre" => "Juan",
        "edad" => 20,
        "notas" => array(9, 8, 6)
    ),
    array(
        "nombre" => "María",
        "edad" => 22,
        "notas" => array(7, 9, 6)
    ),
    array(
        "nombre" => "Carlos",
        "edad" => 21,
        "notas" => array(8, 9, 7)
    ),
    array(
        "nombre" => "Laura",
        "edad" => 23,
        "notas" => array(6, 8, 9)
    )
);


// 1. La edad de María
echo "<strong>1. La edad de María es: </strong>" . $estudiantes[1]['edad'] . " años.<br>";

// 2. La segunda nota de Carlos
echo "<strong>2. La segunda nota de Carlos es: </strong>" . $estudiantes[2]['notas'][1] . "<br>";

// 3. El nombre de todos los estudiantes
echo "<strong>3. Los nombres de todos los estudiantes son:</strong> <br>";
foreach ($estudiantes as $estudiante) {
    echo "- " . $estudiante['nombre'] . "<br>";
}

// 4. La media de notas de Laura
$notasLaura = $estudiantes[3]['notas']; 
$mediaLaura = array_sum($notasLaura) / count($notasLaura);
echo "<strong>4. La media de notas de Laura es:</strong> " . number_format($mediaLaura, 2) . "<br>";

?>


</body>
</html>