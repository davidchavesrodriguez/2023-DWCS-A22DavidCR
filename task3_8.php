<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //1.- Crear un array con 30 posiciones y que contenga números al azar entre 0 y 20 incluídos.
    $array30 = array();
    $push30 = 1;
    for ($push30; $push30 <= 30; $push30++) {
        array_push($array30, rand(0, 20));
    };


    //2.- Imprimir el array creado anteriormente.
    echo "30 random numbers array: ";
    print_r($array30);
    echo "<br>";


    //3.- Crear un array con los siguientes datos: Batman, Superman, Krusty, Bob, Mel y Barney.
    $arrayHeroes = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];


    //4.- Borrar la última posición del array (utilizar funciones de array).
    array_pop($arrayHeroes);


    //5.- Imprimir la posición dónde se encuentra la cadena Superman (utilizar funciones de array).
    echo "Superman is in: ";
    echo array_search("Superman", $arrayHeroes);
    echo "<br>";


    //6.- Añadir los siguientes elementos al final del array: Carl, Lenny, Burns y Lisa (utilizar funciones de array).
    array_push($arrayHeroes, "Carl", "Lenny", "Burns", "Lisa");

    //7.- Ordenar los elementos del array e imprimir el array ordenado (utilizar funciones de array).
    sort($arrayHeroes);
    echo "Famous characters array: ";
    print_r($arrayHeroes);
    echo "<br>";


    //8.- Borrar desde la posición 4 (incluída) 2  elementos (utilizar funciones de array).
    array_splice($arrayHeroes, 4, 2);


    //9.- Añadir los siguientes elementos al comienzo del array: Manzana, Melón, Sandía (utilizar funciones de array).
    array_unshift($arrayHeroes, "Manzana", "Melón", "Sandía");


    //10.- Crear una copia del array con el nombre "micopia" con los elementos 3 al 5 (utilizar funciones de array).
    $micopia = array_slice($arrayHeroes, 3, 5);


    //11.- Añadir el elemento "pera" al final del array (utilizar funciones de array).
    array_push($arrayHeroes, "Pera");


    //12.- Crear un array con el primer array concatenado al array "micopia" (utilizar funciones de array).//
    $combinedArray = array_merge($arrayHeroes, $micopia);
    //Imprimimos por comprobación
    echo "Two array combined!: ";
    print_r($combinedArray);

    ?>
</body>

</html>