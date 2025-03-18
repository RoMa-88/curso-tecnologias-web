<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>

<!-- utilicamos un pos para pedir al ususario los datos -->
    <form action="index.php" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" required>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if(isset($_POST["numero"])) {
        $numero = $_POST["numero"];
        $factorial = 1;
        while($numero > 1 ) {
            $factorial = $factorial * $numero;
            //para que haga el bucle, añadimos la resta al numero
            $numero--;
        }
        echo "El factorial del numero " . $_POST["numero"] . " es: $factorial";
    
    }

//Llamada a la funcion, de forma recursiva

    function calcularFactorial($numero){
        if ($numero<=1){
            return 1;
        }
        
        $factorial = $numero * calcularFactorial($numero-1);
        return $factorial;
    }  
    
    echo "<br>El factorial del numero " . $_POST["numero"] . " es: " . calcularFactorial($_POST["numero"]);
    
    ?>
    
</body>
</html>