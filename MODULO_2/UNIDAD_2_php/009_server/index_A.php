<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globales</title>
</head>
<body>
    <?php
        foreach($_SERVER as $clave => $valor){
            echo $clave. ": " . $valor . "<br>";
        };
            
    
    ?>
</body>
</html>