<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
    <?php
        $personas = array("pedro", "jose", "luis", "pablo");
        foreach ($personas as $persona) {
        // Comprova la primera lletra de la variable $persona,
            if ($persona [0] == "p") {
                echo "<h1> Hola $persona<h1>";
            }
            
        }

        //for

        for ($i=0; $i < count($personas); $i++) { 
            $persona=$personas[$i];
            if ($persona[0] == "p") {
                echo "<h1> Hola $personas[$i]<h1>";
            }
        }
    
    ?>
</body>
</html>