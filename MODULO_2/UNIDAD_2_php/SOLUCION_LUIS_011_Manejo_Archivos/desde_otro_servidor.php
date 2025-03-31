<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo</title>
</head>

<body>
    <form action="desde_otro_servidor.php" method="post">
        <input type="text" name="archivo" id="archivo"><br>
        <input type="submit" value="Enviar" name="submit">
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["archivo"])) {
            $imageUrl = $_POST["archivo"];
            $imageArray = explode('/', $imageUrl); // Archivo en el servidor con su url http://algo/algo/nolmbreimagen.jpg
            print_r($imageArray);
            try {
            $imageRuta = __DIR__ . "/images/" . $imageArray[count($imageArray) - 1];
             echo $imageRuta;
            if (copy($imageUrl, $imageRuta)) {
                    echo "<h1> Genial!</h1>";
                }
            } catch (Exception $e) {
                echo "No se ha podido subir - " . $e->getMessage();
            }
        }
    }
    ?>

</body>

</html>