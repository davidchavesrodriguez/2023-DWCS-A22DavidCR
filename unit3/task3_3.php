<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Factorial calculator</h1>
    <?php

    /* Function factorial

    Modify the previous exercise and write a function that calculates 
    the factorial of a number.

    It receives an integer number as an argument. It must show an error 
    on the screen if it is not an integer.

    It returns the result of the calculation or -1 if the number is not valid.

    We can only calculate the factorial for an integer number that 
    is greater than 0.


    Program

    Define a constant with a number and send it as an argument 
    to the function factorial.

    Write the code that invokes the previous function and
    shows the result on a web page.

    */

    define("CONSTANT", 7);
    function factorialConstant($CONSTANT)
    {
        $value = 1;
        for ($i = CONSTANT; $i > 1; $i--) {
            $value = $value * $i;
        }
        echo "<h4>The factorial value of ", CONSTANT, " is: ", $value, "<h4>";
    }
    if (CONSTANT <= 0) {
        echo "-1";
    } else {
        echo factorialConstant(CONSTANT);
    }
    ?>
</body>

</html>