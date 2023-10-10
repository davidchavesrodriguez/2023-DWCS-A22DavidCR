<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>GPTphp</title>
</head>

<body>
    <!--Suma de Números Pares e Impares: Escribe un programa que calcule la suma de todos los números pares e impares en un array de enteros.-->
    <?php
    $arrayNumeros = [1, 0, 9, 54, 3, 23, 65, 12, 98, 23, 12, 4, 542, 23, 67];
    $totalPares = 0;
    $totalImpares = 0;
    for ($i = 0; $i < count($arrayNumeros); $i++) {
        if ($arrayNumeros[$i] % 2 == 0) {
            $totalPares += $arrayNumeros[$i];
        } else {
            $totalImpares += $arrayNumeros[$i];
        }
    }
    echo "Suma de Números Pares e Impares: O total dos pares son: ", $totalPares, " e o dos impares: ", $totalImpares;
    ?>

    <!--Contador de Palabras: Crea una función que tome una cadena de texto como entrada y cuente cuántas palabras diferentes hay en ella. Las palabras están separadas por espacios.-->
    <?php
    $cadeaTexto = "Chimchar ten tipo Fuego mentres que Piplup ten Agua";
    function contarPalabras($cadeaTexto)
    {
        echo "Contador de Palabras: O total de palabras é: ", str_word_count($cadeaTexto); //Non funciona con palabras acentuadas!!
    }
    contarPalabras($cadeaTexto);
    ?>

    <!--Ordenar un Array de Cadenas: Escribe un programa que ordene un array de cadenas de texto en orden alfabético de A a Z.-->
    <?php
    $frasesCelebres = array(
        "La vida es lo que pasa mientras estás ocupado haciendo otros planes. - John Lennon",
        "La única forma de hacer un gran trabajo es amar lo que haces. - Steve Jobs",
        "El único modo de hacer un trabajo excelente es amar lo que haces. - Warren Buffett",
        "No dejes que ayer ocupe demasiado de hoy. - Will Rogers",
        "La educación es el arma más poderosa que puedes usar para cambiar el mundo. - Nelson Mandela",
        "La única manera de hacer un gran trabajo es amar lo que haces. - Steve Jobs",
        "La vida es realmente simple, pero insistimos en hacerla complicada. - Confucio",
        "La simplicidad es la máxima sofisticación. - Leonardo da Vinci",
        "No hay atajos para ningún lugar que valga la pena. - Beverly Sills",
        "La imaginación es más importante que el conocimiento. - Albert Einstein",
    );
    natcasesort($frasesCelebres);
    echo "Ordenar un Array de Cadenas: O array ordenado sería: <pre>";
    print_r($frasesCelebres);
    echo "</pre>"
    ?>

    <!--Validación de Correo Electrónico: Crea una función que verifique si una cadena es una dirección de correo electrónico válida (xxx@iessanclemente.net) según ciertos criterios (por ejemplo, debe contener "@" y un dominio válido).-->
    <?php
    $emailValido = "A22DavidCR@iessanclemente.net";
    $emailNoValido = "19.dchaves@gmail.com";
    $patronEmail = "/[a-zA-Z0-9.%+-]+@iessanclemente.net$/";
    function validarCorreo($correo, $patron)
    {
        if (preg_match($patron, $correo)) {
            echo "O correo ta ben";
        } else {
            echo "Ese correo non sirve";
        }
    }
    validarCorreo($emailValido, $patron);
    ?>

    <!--Calculadora de Factorial: Implementa una función que calcule el factorial de un número entero dado. El factorial de un número entero positivo N se define como el producto de todos los enteros desde 1 hasta N.-->
    <!--Buscador de Números Primos: Escribe un programa que encuentre todos los números primos en un rango dado y los muestre en una lista.-->
    <!--Reversión de Cadenas: Crea una función que invierta una cadena de texto. Por ejemplo, si la entrada es "Hola", la salida debe ser "aloH".-->
    <!--Calculadora de Edades: Diseña un programa que tome las fechas de nacimiento de varias personas y calcule sus edades actuales.-->
    <!--Generador de Contraseñas: Crea una función que genere contraseñas aleatorias con una longitud específica y diferentes tipos de caracteres (mayúsculas, minúsculas, números y símbolos).-->
    <!--Análisis de Texto: Escribe un programa que tome una cadena de texto y cuente cuántas veces aparece cada palabra en ella, luego muestra las palabras y sus conteos.-->
</body>

</html>