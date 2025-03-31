<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulari minim</title>
</head>
<body>
    <form id="form" action="primerForm.php" method="POST">
        Edad: <input type="number" name="edad" value=""><br>
        Name: <input type="text" name="name" value=""><br>
        E-mail: <input type="text" name="email"><br>
        Curso: 
        <select name="curso">
            <option value="html">HTML</option>
            <option value="css">CSS</option>
            <option value="js">JS</option>
        </select><br>
        Genero: 
        <input type="radio" name="genero" value="masculino">Masculino
        <input type="radio" name="genero" value="femenino">Femenino<br>
        <input type="radio" name="genero" value="otro">Otro<br>
        <input type="submit">
    </form>

    <?php
    // PRIMER if: mostrem el primer "Tus Datos" si hi ha POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") { 
        ?>
        <h1>Tus Datos:</h1>
        <ul>
            <li>Nombre:  <?php echo $_POST["name"] ?></li>
            <li>Correo:  <?php echo $_POST["email"] ?></li>
            <li>Curso <?php echo $_POST["curso"] ?></li>
            <li>Genero <?php echo $_POST["genero"] ?></li>
        </ul>
        <?php
    } else {
        echo "Cubre el formulario";
    }
    ?>

</body>
</html>
