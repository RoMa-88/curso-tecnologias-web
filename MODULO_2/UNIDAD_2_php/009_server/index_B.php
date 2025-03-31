<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globales</title>
</head>
<body>

<!--
Global 
vs 
define(clave, valor) // constante y global sin global



$_SERVER // Array != $_SERVER[‘request_method’]


$_POST[‘’] // Array Añadir 


$_GET[‘’] // Array Url String 


$_DELETE[‘’]  Eleimiinar


$_PUT[‘’]  Modificar (Update)

Escribe tu nombre en una variable global con “define()”.
Escribe tu edad en una variable global.
Escribe una función que imprima tu nombre y tu edad.

-->

    <?php
        
        define('nombre' , 'Marc');
        $edad = 37;

        function imprimir(){
            echo '<br>' .  $_SERVER['HTTP_HOST'];
            global $edad;
            echo "<br>" . nombre;
            echo  "<br>" . $edad;
        }
        
        imprimir();

    ?>
</body>
</html>