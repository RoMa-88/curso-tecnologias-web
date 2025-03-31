<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo</title>
</head>

<body>
    <form action="manejar_Archivos_basico.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo"><br>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["archivo"]))
            $imageName = __DIR__ . "/images/" . $_FILES["archivo"]["name"];
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $imageName)) {
            echo "<h1> Genial!</h1>";
        } else {
            echo "No se ha podido subir";
        }
    }


    ?>
    <?php
    $archivo = 'images/104-cubes-web-logo-desarrollo-creacion-web-carteleria-digital-smart-tv-digital-signage-1-1.png';
    $tipo = pathinfo($archivo, PATHINFO_EXTENSION);
    $contenido = file_get_contents($archivo);
    $base64 = 'data:image/' . $tipo . ';base64,' . base64_encode($contenido);

    echo '<img src="' . $base64 . '" alt="Imagen en base64">';
    $html = file_get_contents('https://104cubes.com/)');
    $archivo = fopen('archivo.html', 'w');
    fwrite($archivo, $html);
    ?>
</body>

</html>