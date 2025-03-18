<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>
<body>
    
    <?php
        
        $nombre = 'Marc';
        $apellido = 'Rodríguez';
        $edad = 37;
        $ciudadNatal = 'Barcelona'; 

        function imprimir(){
            global $nombre, $apellido, $edad, $ciudadNatal;
                echo "Nombre: $nombre<br>"; 
                echo "Apellido: $apellido<br>";
                echo "Edad:  $edad<br>";
                echo "Ciudad Natal: $ciudadNatal<br>";

        }

    imprimir();
    
    ?>
</body>
</html>