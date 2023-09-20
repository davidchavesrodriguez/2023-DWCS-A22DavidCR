<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /* 

We need to store the following information in a multidimensional array:

    John
        email : john@demo.com
        website : www.john.com
        age : 22
        password : pass
    Anna
        email : anna@demo.com
        website : www.anna.com
        age : 24
        password : pass
    Peter
        email : peter@mail.com
        website : www.peter.com
        age : 42
        password : pass
    Max
        email : max@mail.com
        website : www.max.com
        age : 33
        password : pass

1.- Create the data structure and store all the above information.

2.- Using the foreach instruction and HTML lists, print all the stored information so that it is shown in the example above.
 */

    $arrays = array("John", "john@demo.com", "www.john.com", 22, "pass");
    array("Anna", "anna@demo.com", "www.anna.com", 24, "pass");
    array("Peter", "peter@demo.com", "www.peter.com", 42, "pass");
    array("Max", "max@demo.com", "www.max.com", 33, "pass");

    foreach ($arrays as $element) {
        echo "<ul><li>$arrays[0]</li><ul>";
        echo "<ul>";
        echo "<li>$arrays[1]</li>";
        echo "<li>$arrays[2]</li>";
        echo "<li>$arrays[3]</li>";
        echo "</ul></ul>";
    }


    echo "Hola, Isamel";
    ?>
</body>

</html>