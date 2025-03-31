<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari d'exemple</title>
</head>
<body>
    <h1>Formulari d'exemple</h1>

    <!-- 
        Aquí tenim el formulari que enviarà les dades 
        a welcome.php mitjançant el mètode POST.
    -->
    <form action="welcome.php" method="POST">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name">
        <br><br>

        <label for="email">Correu electrònic:</label>
        <input type="text" id="email" name="email">
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
