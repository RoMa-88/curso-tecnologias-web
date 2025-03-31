<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribir archivos con php en text area</title>
</head>
<body>
    <h1>Escribe El  texto a guardar en el servidor.</h1>
    <form action="textArea.php" method="post">
        <label for="texto">Texto:</label><br>
        <textarea name="texto" id="text" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["texto"])) {
            $texto = $_POST["texto"];
            try {
                // Obrim el fitxer en mode escriptura ("w" sobreescriu)
                $archivo = fopen("texto.txt", "w");

                // Escrivim el contingut del textarea al fitxer
                fwrite($archivo, $texto);

                // Tanquem el fitxer per guardar canvis
                fclose($archivo);

                // Mostrem un missatge amb el contingut escrit
                echo "<h2>Texto guardado en el servidor:</h2>";
                echo nl2br(htmlspecialchars($texto));
            } catch (Exception $e) {
                // En cas d'error, mostrem el missatge
                echo "Error al guardar el archivo: " . $e->getMessage();
            }
        } else {
            // Si l'usuari no ha escrit res, ho indiquem
            echo "<h2>Por favor, ingresa un texto.</h2>";
        }
    }
?>
</body>
</html>