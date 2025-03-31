<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Intereses</title>
    <style>
        /* Estilos básicos para que el formulario se vea más agradable */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;        /* Ancho máximo de la caja contenedora */
            margin: 0 auto;         /* Centrar horizontalmente */
            background-color: #fff; /* Fondo blanco */
            padding: 20px;          /* Espaciado interno */
            border-radius: 8px;     /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Sombra sutil */
        }
        h1, h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;    /* Separación entre campos */
        }
        label {
            display: block;         /* Forzar a que el label sea un bloque */
            margin-bottom: 5px;     /* Separación entre el label y el campo */
            font-weight: bold;      /* Negrita para el texto */
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;           /* Ocupar todo el ancho disponible */
            padding: 8px;          /* Espaciado interno */
            box-sizing: border-box; /* Incluir el padding en el ancho total */
            border: 1px solid #ccc; /* Borde gris claro */
            border-radius: 4px;     /* Bordes redondeados */
        }
        input[type="submit"] {
            background-color: #4CAF50; /* Color de fondo verde */
            color: white;             /* Texto en blanco */
            padding: 10px 20px;       /* Espaciado interno */
            border: none;             /* Sin borde */
            border-radius: 4px;       /* Bordes redondeados */
            cursor: pointer;          /* Cambia el cursor al pasar por encima */
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Cambia ligeramente de color al pasar el ratón */
        }
        .result {
            margin-top: 20px;         /* Separación antes de la caja de resultados */
            background-color: #e8f5e9; /* Fondo verde clarito */
            padding: 15px;
            border-radius: 8px;
        }
        ul {
            list-style-type: disc;    /* Puntos en la lista */
            margin-left: 20px;        /* Sangrado a la izquierda */
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Comprobamos si se ha enviado el formulario (método POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recogemos los valores del formulario
        // Usamos ?? '' para evitar errores si no existe la variable
        $nombre = $_POST['nombre'] ?? '';
        $edad = $_POST['edad'] ?? '';
        
        // "intereses" será un array si se seleccionan varias opciones
        $intereses = $_POST['intereses'] ?? [];

        // Mostramos los resultados en pantalla
        echo "<div class='result'>";
        echo "<h2>Resultados</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Edad:</strong> $edad</p>";

        // Verificamos si se seleccionaron intereses
        if (!empty($intereses)) {
            echo "<p><strong>Intereses seleccionados:</strong></p>";
            echo "<ul>";
            foreach ($intereses as $interes) {
                echo "<li>$interes</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No seleccionaste ningún interés.</p>";
        }
        echo "</div>";
    } else {
        // Si no se ha enviado el formulario, mostramos el formulario
        echo "<h1>Formulario de Intereses</h1>";
        echo "<form method='POST' action=''>";

        echo "<div class='form-group'>";
        echo "<label for='nombre'>Nombre:</label>";
        echo "<input type='text' id='nombre' name='nombre' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='edad'>Edad:</label>";
        echo "<input type='number' id='edad' name='edad' required>";
        echo "</div>";

        echo "<div class='form-group'>"; // Iniciamos un contenedor para el grupo de checkboxes
        echo "  <label>Selecciona tus intereses:</label>"; // Etiqueta que indica al usuario qué hacer
        
        // Opción: Deporte
        echo "  <div>"; // Contenedor para el checkbox de Deporte
        echo "    <input type='checkbox' id='deporte' name='intereses[]' value='Deporte'>"; // Checkbox para 'Deporte'
        // Se usa 'name=\"intereses[]\"' para que al enviar el formulario se obtenga un array con los valores seleccionados
        echo "    <label for='deporte'>Deporte</label>"; // Etiqueta asociada al checkbox 'Deporte'
        echo "  </div>";
        
        // Opción: Cine
        echo "  <div>"; // Contenedor para el checkbox de Cine
        echo "    <input type='checkbox' id='cine' name='intereses[]' value='Cine'>"; // Checkbox para 'Cine'
        echo "    <label for='cine'>Cine</label>"; // Etiqueta asociada al checkbox 'Cine'
        echo "  </div>";
        
        // Opción: Música
        echo "  <div>"; // Contenedor para el checkbox de Música
        echo "    <input type='checkbox' id='musica' name='intereses[]' value='Música'>"; // Checkbox para 'Música'
        echo "    <label for='musica'>Música</label>"; // Etiqueta asociada al checkbox 'Música'
        echo "  </div>";
        
        // Opción: Lectura
        echo "  <div>"; // Contenedor para el checkbox de Lectura
        echo "    <input type='checkbox' id='lectura' name='intereses[]' value='Lectura'>"; // Checkbox para 'Lectura'
        echo "    <label for='lectura'>Lectura</label>"; // Etiqueta asociada al checkbox 'Lectura'
        echo "  </div>";
        
        // Opción: Videojuegos
        echo "  <div>"; // Contenedor para el checkbox de Videojuegos
        echo "    <input type='checkbox' id='videojuegos' name='intereses[]' value='Videojuegos'>"; // Checkbox para 'Videojuegos'
        echo "    <label for='videojuegos'>Videojuegos</label>"; // Etiqueta asociada al checkbox 'Videojuegos'
        echo "  </div>";
        
        echo "</div>"; // Cerramos el contenedor del grupo de checkboxes

        echo "<input type='submit' value='Enviar'>";
        echo "</form>";
    }
    ?>
</div>

</body>
</html>
