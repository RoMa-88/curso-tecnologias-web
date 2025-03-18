<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>
    <?php
    $participantes = ["Ana", "Carlos", "Pedro", "Sofía", "Luis", "Marta", "Jorge", "Elena", "Raúl", "Lucía"];
    $premios = 3;

    function sorteo($participantes, $premios){
        $totalParticipantes = count($participantes);
        $ganadores = []; 

        // Bucle hasta que tengamos la cantidad de ganadores deseados
        while (count($ganadores) < $premios) {
            $indiceConcursante = rand(0, $totalParticipantes - 1);
            
            // Si el índice no está en la lista de ganadores, lo añadimos
            if (!in_array($indiceConcursante, $ganadores)) {
                $ganadores[] = $indiceConcursante;
            }
        }
        return $ganadores;
    }

    $listaGanadores = sorteo($participantes, $premios);

    echo "<h1>Los ganadores son:</h1>";
    echo "<ul>"; // Apertura de la lista
    foreach ($listaGanadores as $i) {
        echo "<li>" . $participantes[$i] . "</li>"; 
    }
    echo "</ul>"; // Cierre de la lista
    ?>
</body>
</html>
