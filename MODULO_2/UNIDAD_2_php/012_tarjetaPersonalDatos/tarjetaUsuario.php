<?php
// Variables per defecte
$nombre = "";
$edad = "";
$email = "";
$curso = "";
$intereses = [];
$avatarPath = "images/avatar_default.png"; // Imatge per defecte

// Comprovem si s'ha enviat el formulari
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperem dades
    $nombre = $_POST['nombre'] ?? "";
    $edad = $_POST['edad'] ?? "";
    $email = $_POST['email'] ?? "";
    $curso = $_POST['curso'] ?? "";
    $intereses = $_POST['intereses'] ?? [];

    // Processem la pujada de fitxer (avatar)
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        $nombreArchivo = time() . "_" . $_FILES['avatar']['name'];
    
        // __DIR__ retorna la ruta del directori on està aquest fitxer PHP
        // Li afegim "/images/" i el nom de l'arxiu
        $destino = __DIR__ . "/images/" . $nombreArchivo;
    
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destino)) {
            // Per a HTML, potser segueixes mostrant "images/..." (ruta relativa al navegador)
            // Però a nivell de servidor, ja has guardat el fitxer a la ruta absoluta
            $avatarPath = "images/" . $nombreArchivo;
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con Avatar</title>
    <!--
       Afegim CSS en línia per fer la targeta més atractiva.
       Utilitzem la font Trebuchet MS, i amaguem el formulari 
       un cop l'usuari l'ha enviat.
    -->
    <style>
        body {
            font-family: "Trebuchet MS", sans-serif;
            margin: 20px;
        }
        .hidden {
            display: none;
        }   
        .hidden {
            display: none;
        }
        .card {
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            background-color: #f9f9f9;
        }
        .card {
            border: 2px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 300px;
            background-color: #f9f9f9;
        }
        .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .card h2 {
            margin-top: 0;
        }
        .card p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
    <!--
        Si ja hem enviat el formulari (POST), 
        afegim la classe "hidden" per amagar el títol i el formulari.
    -->
    <h1 class="<?php echo ($_SERVER['REQUEST_METHOD'] === 'POST') ? 'hidden' : ''; ?>">
        Registro de usuario
    </h1>

    <form 
        action="" 
        method="POST" 
        enctype="multipart/form-data"
        class="<?php echo ($_SERVER['REQUEST_METHOD'] === 'POST') ? 'hidden' : ''; ?>"
    >
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad"><br><br>

        <label for="email">Correo:</label>
        <input type="email" id="email" name="email"><br><br>

        <p>Curso:</p>
        <input type="radio" id="curso_css" name="curso" value="CSS">
        <label for="curso_css">CSS</label>
        <input type="radio" id="curso_php" name="curso" value="PHP">
        <label for="curso_php">PHP</label>
        <input type="radio" id="curso_js" name="curso" value="JavaScript">
        <label for="curso_js">JavaScript</label>
        <br><br>

        <p>Intereses (elige uno o varios):</p>
        <input type="checkbox" id="interes_videojuegos" name="intereses[]" value="Videojuegos">
        <label for="interes_videojuegos">Videojuegos</label>

        <input type="checkbox" id="interes_rol" name="intereses[]" value="Rol">
        <label for="interes_rol">Rol</label>

        <input type="checkbox" id="interes_scifi" name="intereses[]" value="Películas SciFi">
        <label for="interes_scifi">Películas SciFi</label>

        <input type="checkbox" id="interes_chocolate" name="intereses[]" value="Chocolate">
        <label for="interes_chocolate">Chocolate</label>
        <br><br>

        <label for="avatar">Subir avatar:</label>
        <input type="file" id="avatar" name="avatar"><br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    // Si hem rebut el formulari, mostrem la targeta
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        ?>
        <div class="card">
            <img src="<?php echo $avatarPath; ?>" alt="Avatar">
            <h2><?php echo $nombre; ?></h2>
            <p>Edad: <?php echo $edad; ?></p>
            <p>Correo: <?php echo $email; ?></p>
            <p>Curso elegido: <?php echo $curso; ?></p>
            <p>Intereses:
                <?php echo implode(", ", $intereses); ?>
            </p>
        </div>
        <?php
    }
    ?>
</body>
</html>
