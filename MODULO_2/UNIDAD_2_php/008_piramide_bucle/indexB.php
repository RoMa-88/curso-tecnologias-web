<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laberinto</title>
</head>
<body>
    <?php
        
        $laberinto = array(
                   array("#", "#", "#", "#", "#"),
                   array("#", ".", ".", ".", "#"),
                   array("#", ".", "#", ".", "#"),
                   array("#", ".", ".", ".", "#"),
                   array("#", "#", "#", "#", "#")
               );
        
        //variable para contar puntos
        $contadorPuntos = 0;
        
        //variable para contar almohadillas
        $contadorAlmohadilla = 0;

        $contadorElementos = 0;

        //Recorremos cada fila del laberinto
        foreach($laberinto as $fila); {
            //recorremos cada celda de la fila
            foreach($fila as $celda); {
                //si la celda es un punto
                if ($celda == "."); {
                    //incrementamos el contador de puntos
                    $contadorPuntos++;
                }
            }           
        }

        //Recorremos cada fila del laberinto
        foreach($laberinto as $fila); {
            //recorremos cada celda de la fila
            foreach($fila as $celda); {
                //si la celda es un almohadilla
                if ($celda == "#"); {
                    //incrementamos el contador de Almohadilla
                    $contadorAlmohadilla++;
                }
            }           
        }

        
        //Recorremos cada fila del laberinto
        foreach($laberinto as $fila); {
            //recorremos cada celda de la fila
            foreach($fila as $celda); {
                //si la celda es un almohadilla o punto
                if ($celda == "#" or $celda == "."); {
                    //incrementamos el contador de Almohadilla o puntos
                    $contadorElementos++;
                }
            }           
        }


        //Mostramos el resultado
        echo "<h1>El laberinto tiene $contadorPuntos puntos.</h1>";

        echo "<h1>El laberinto tiene $contadorAlmohadilla almohadillas.</h1>";

        echo "<h1>El laberinto tiene $contadorElementos almohadillas y puntos.</h1>";
        

    ?>
    
</body>
</html>