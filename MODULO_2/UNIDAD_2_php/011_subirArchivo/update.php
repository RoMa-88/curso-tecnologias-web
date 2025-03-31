<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar imagen desde URL</title>
</head>
<body>
    <form action="" method="post">
        <label for="archivo">Introduce la URL de la imagen:</label><br>
        <input type="text" name="archivo" id="archivo" required><br><br>
        <input type="submit" value="Enviar" name="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["archivo"])) {
            // URL introducida por el usuario
            $imageUrl = $_POST["archivo"];
            
            // Extraemos el nombre del archivo de la URL
            $imageArray = explode('/', $imageUrl);
            $imageName = end($imageArray);

            // Si la URL tiene parámetros (p.ej. ?size=1280x720), los eliminamos
            $parts = explode('?', $imageName);
            $imageName = $parts[0];

            // Descargamos el contenido de la imagen
            $imageData = @file_get_contents($imageUrl); // @ suprime warnings

            if ($imageData === false) {
                echo "<p>No se pudo descargar la imagen. Verifica la URL.</p>";
            } else {
                // Verificamos si la carpeta 'images' existe. Si no, la creamos.
                if (!file_exists('images')) {
                    mkdir('images', 0755, true);
                }

                // Guardamos la imagen en la carpeta 'images'
                $filePath = 'images/' . $imageName; 
                $saved = file_put_contents($filePath, $imageData);

                if ($saved !== false) {
                    echo "<p>¡Imagen descargada correctamente!</p>";
                    echo "<p>Guardada como: <strong>$filePath</strong></p>";
                    // Mostramos la imagen en pantalla
                    echo "<img src='$filePath' alt='Imagen descargada' style='max-width:200px;'>";
                } else {
                    echo "<p>Error al guardar la imagen en el servidor.</p>";
                }
            }
        } else {
            echo "<p>Por favor, introduce una URL válida.</p>";
        }
    }
    ?>
</body>
</html>
