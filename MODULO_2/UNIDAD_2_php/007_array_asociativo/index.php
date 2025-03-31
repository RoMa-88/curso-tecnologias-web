<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array asociativo</title>
</head>
<body>

<?php

//CRUD
// Create, Read, Update, Delete

// Crear array (CREATE)
$colores = array("rojo", "verde", "azul");

// accedemos a “verde” (READ)
echo $colores[1] . "<br>";

//modificamos verde por amarillo (UPDATE)
$colores[1] = "amarillo"; 

// Añadir (UPDATE)
$colores[] = "verde"; //añadimos verde al final

// eliminamos “rojo” (DELETE)
array_splice($colores, 0,0); 

//Loop (READ)
$alumnos = array("pedro", "pablo", "pepe");
foreach ($alumnos as $alumno) {
   echo "$alumno <br>";
}?>





    <?php 
    $agenda = array(
    
    array("nombre"=>"Carlos",
     "telefono"=>"123456789",
      "mail"=>"carlos@mail.com"),
    array("nombre"=> "Juan",
     "telefono"=>"987654321",
      "mail"=>"juan@mail.com"),
    array("nombre"=> "Ana",
       "telefono"=>"156481651",
        "mail"=>"ana@mail.com")
        
    );

    
        foreach($agenda as $contacto) { 
            echo "<ul>";
            echo "<li>" .$contacto["nombre"]. "</li>";
            echo "<li>" .$contacto["telefono"]. "</li>";
            echo "<li>" .$contacto["mail"]. "</li>";
            echo "</ul>";
        
        }



        $agenda []= array("nombre"=> "Pedro",
        "telefono"=>"123456789",
        "mail"=>"pedro@mail.com");



        foreach($agenda as $contacto) { 
            echo "<ul>";
            echo "<li>" .$contacto["nombre"]. "</li>";
            echo "<li>" .$contacto["telefono"]. "</li>";
            echo "<li>" .$contacto["mail"]. "</li>";
            echo "</ul>";
        
        }


        $agenda[0]["telefono"]= "911564564";



    
    ?>
    
</body>
</html>