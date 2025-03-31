<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Multidimensionales</title>
</head>
<body>
<?php
//Simple
$frutas = array(4,5,2);

//Multi
$frutas = array(
        array(4, 100),
        array(5, 50),
        array(2, 25)
    );
echo $frutas[0][0]; // 4

echo "<br>"; // Salto de línea para mejorar la legibilidad

echo $frutas[1][1]; // 50
?>

</body>
</html>