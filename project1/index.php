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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bottomMargin {
            margin-bottom: 10px;
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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                break;
            } else {
                home();
            }
            break;
    }
    ?>


    <?php
    function form()
    {
        // FORM
        echo '
    
    <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST" enctype="multipart/form-data">
        <h1>Complete your CV</h1>
        <label for="name">Name:</label>
        <input type="text" name="name" class="bottomMargin">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" class="bottomMargin">

        <label for="photo">Add a photo:</label>
        <input type="file" name="photo" id="photo" class="bottomMargin">
        <label for="subscribe">Subscribe to news</label>
        <br>
        <input type="checkbox" name="subscribe" id="subscribe" class="bottomMargin">
        <input type="submit" name="submit" id="submit" value="Save changes">
        <input type="reset" name="reset" id="reset" value="Reset data">
    </form>';
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (
        $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])
    ) {
        $name = $surname = $subscribe = "";
        $name = test_input($_POST["name"]);
        $surname = test_input($_POST["surname"]);
        $subscribe = isset($_POST["subscribe"]);

        echo "Your name is ", $name, ".";
        echo "<br>";
        echo "You wrote ", $surname, " as surname.";
        echo "<br>";
        if ($_POST["subscribe"]) {
            echo "You asked to be subscribed to our newsletter!";
        } else {
            echo "You are not subscribed";
        }
    }


    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $photo = $_FILES["photo"];
        $target_dir = "images/";

        // Verify images
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($photo['type'], $allowedTypes)) {
            $maxFileSize = 2 * 1024 * 1024;
            if ($photo['size'] <= $maxFileSize) {
                $photo_name = $photo["name"];
                $target_file = $target_dir . $photo_name;
                move_uploaded_file($photo["tmp_name"], $target_file);
                echo "<br>";
                echo "Here is your image: <br> <img src='images/$photo_name' alt='Image' width='333px'>";
            } else {
                echo "Size is too big.";
            }
        } else {
            echo "<br>";
            echo "That is not a valid format.";
        }
    } ?>
    <?php
    function home()
    {
        // Read php.ini values
        $latitude = ini_get("date.default_latitude");
        $longitude = ini_get("date.default_longitude");

        echo "<h1>Welcome to my page!</h1>";
        echo "<h3>Here you have some info you might find useful: </h3>";
        echo "Santiago's latitude is: ";
        echo $latitude;
        echo "<br>";
        echo "Santiago's longitude is: ";
        echo $longitude;
        echo "<br>";
        date_default_timezone_set('Europe/Madrid');

        $currentDate = date('d-m-Y');

        // Calculate sunrise and sunset times (DEPRECATED)
        $sunrise = date_sunrise(
            strtotime($currentDate),
            SUNFUNCS_RET_STRING,
            $latitude,
            $longitude,
            ini_get('date.sunrise_zenith'),
            5
        );

        $sunset = date_sunset(
            time(),
            SUNFUNCS_RET_STRING,
            $latitude,
            $longitude,
            90,
            5
        );

        echo "Today's Date: $currentDate<br>";
        echo "Sunrise Time in Santiago de Compostela: $sunrise<br>";
        echo "Sunset Time in Santiago de Compostela: $sunset<br>";
    }
    ?>


    <?php
    function validarDNI($dni)
    {
        $dni = strtoupper(trim($dni));

        if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
            $numeroDNI = substr($dni, 0, 8);
            $letraCalculada = $letras[$numeroDNI % 23];
            $letraDNI = $dni[8];

            if ($letraCalculada === $letraDNI) {
                return true;
            }
        }

        return false;
    }
    ?>

    <?php
    function dniCheck()

    {
        echo "
        <!-- DNI -->
    <form method='POST'>
        <h1>Do you want to check your DNI?</h1>
        <label for='dniCheck'>Submit your DNI:</label>
        <input type='text' name='dni'>
        <input type='submit' name='submitId' id='submitId'>
    </form>";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitId"])) {
            $dni = isset($_POST["dni"]) ? $_POST["dni"] : "";

            $esValido = validarDNI($dni);

            if ($esValido) {
                echo "<p style='color:green'>DNI $dni is valid.</p>";
            } else {
                echo "<p style='color:red'>DNI $dni is NOT valid.</p>";
            }
        }
    }
    ?>
</body>

</html>