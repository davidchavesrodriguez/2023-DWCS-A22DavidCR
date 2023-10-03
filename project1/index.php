<!DOCTYPE html>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            border-right: 1px solid #bbb;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04aa6d;
        }
    </style>
</head>
<!-- All the project must be written in English.
Create a new folder called project1.
Use the file menu.html as a template for the horizontal menu.
Create the following links in the navigation bar: Home | Form | DNI check
In the hrefs the links must be something like: index.php?load=inicio, index.php?load=formulario, index.php?load=dni

There will be only one php file: index.php. It will check the value of the load parameter and it will load in the page the corresponding contents. If the load parameter doesn't have any value assigned or has a wrong value, the default page will be loaded. We can include external files.

The Home page must show:

- The coordinates from your php.ini file (latitude and longitude of Santiago de Compostela).

- Today's date, sunrise time, sunset time in Santiago de Compostela.

The Form page must be like the image below but in English.

After submitting the form:

- The text input fields must be required (use PHP to check it).

- Use all the security checks using PHP.

- Check that the file is an image and set a limit for its size.

- Show the information introduced by the user. Show the image.

The DNI check page must ask for your DNI and check if it is correct using a function called dniCheck(). It will indicate if it is correct. You will use different colors for the message depending on the result shown. You can get information about the DNI check in: http://dni.zeo.es/obtener-letra-dni -->

<body>
    <div>
        <ul>
            <li>
                <a class="active" href="index.php?load=home">Home</a>
            </li>
            <li>
                <a href="index.php?load=form">Form</a>
            </li>
            <li>
                <a href="index.php?load=dniCheck">DNI Check</a>
            </li>
        </ul>
    </div>

    <?php
    $load = "";
    switch ($_GET["load"]) {
        case 'home':
            home();
            break;
        case 'form':
            form();
            break;
        case 'dniCheck':
            dniCheck();
            break;
        default:
            break;
    }
    ?>


    <?php
    function form()
    {
        // FORM
        echo '
    <h1>Complete your CV</h1>
    <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="GET">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="surname">Surname:</label>
        <input type="text" name="surname">
        <br>
        <br>
        <label for="photo">Add a photo:</label>
        <input type="file" name="photo" id="photo">
        <br>
        <br>
        <input type="checkbox" name="subscribe" id="subscribe">
        <label for="subscribe">Subscribe to news</label>
        <br>
        <input hidden type="text" name="load" value="form">
        <input type="submit" name="submit" id="submit" value="Save changes">
        <input type="reset" name="reset" id="reset" value="Reset data">
    </form>';
    }
    ?>
    <?php

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $photo = $_FILES["photo"];

        // Verify images
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Tipos de imagen permitidos
        if (in_array($photo['type'], $allowedTypes)) {
            // Limit size
            $maxFileSize = 2 * 1024 * 1024; // 2MB
            if ($photo['size'] <= $maxFileSize) {
                $photo_name = $photo["name"];
                move_uploaded_file($photo["tmp_name"], "project1/images/$photo_name");
                echo "<br>";
                echo "Imaxe cargada: <img src='project1/images/$photo_name' alt='Imagen cargada'>";
            } else {
                echo "El tamaño del archivo es demasiado grande. Debe ser menor o igual a 2MB.";
            }
        } else {
            echo "El archivo no es una imagen válido. Los formatos permitidos son JPEG, PNG o GIF.";
        }
    }
    ?>

    <?php
    function home()
    {
        // Read php.ini values
        $latitude = ini_get("date.default_latitude");
        $longitude = ini_get("date.default_longitude");

        echo "Santiago's latitude is: ";
        echo $latitude;
        echo "<br>";
        echo "Santiago's longitude is: ";
        echo $longitude;
        echo "<br>";

        // Set the timezone to Santiago de Compostela or your desired timezone
        date_default_timezone_set('Europe/Madrid');

        // Get today's date
        $currentDate = date('Y-m-d');

        // Calculate sunrise and sunset times (DEPRECATED)
        $sunrise = date_sunrise(
            strtotime($currentDate),
            SUNFUNCS_RET_STRING,
            $latitude,
            $longitude,
            ini_get('date.sunrise_zenith')
        );

        $sunset = date_sunset(
            strtotime($currentDate),
            SUNFUNCS_RET_STRING,
            $latitude,
            $longitude,
            ini_get('date.sunset_zenith')
        );

        // Display the information
        echo "Today's Date: $currentDate<br>";
        echo "Sunrise Time in Santiago de Compostela: $sunrise<br>";
        echo "Sunset Time in Santiago de Compostela: $sunset<br>";
    }
    ?>


    <?php
    function validarDNI($dni)
    {
        // Trim spaces and convert to CAPS
        $dni = strtoupper(trim($dni));

        // Verify DNI
        if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
            $numeroDNI = substr($dni, 0, 8);
            $letraCalculada = $letras[$numeroDNI % 23];
            $letraDNI = $dni[8];

            // Compare DNI letter
            if ($letraCalculada === $letraDNI) {
                return true; // Valid
            }
        }

        return false; // Not valid
    }
    ?>

    <?php
    function dniCheck()
    {
        echo "
        <!-- DNI -->
    <form method='POST'>
        <label for='dniCheck'>Submit your DNI:</label>
        <input type='text' name='dni'>
        <input type='submit' name='submitId' id='submitId'>
    </form>";
        // Verify form
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitId"])) {
            // Get DNI
            $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";

            $esValido = validarDNI($dni);

            if ($esValido) {
                echo "El DNI $dni es válido.";
            } else {
                echo "El DNI $dni no es válido.";
            }
        }
    }
    ?>
</body>

</html>