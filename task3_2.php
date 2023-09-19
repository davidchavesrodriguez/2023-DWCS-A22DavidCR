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
    <h1>Power calculator</h1>
    <?php
    /* Write a function that:

    - It receives two integer numbers. If the arguments are not 
    integers it must show an error message.

    - The first argument is the value of the base and it is 
    compulsory. The second argument is the value of the exponent 
    and it is optional (default value 2).

    - It returns a number with the result.

    Write the code that invokes this function and shows the 
    result on a web page. */

    function powerCalc(int $base, int $exponent = 2)
    {
        $total = 1;
        for ($i = $exponent; $i >= 1; $i--) {

            $total *= $base;
        }
        return "The total value is " . $total;
    }
    echo powerCalc(4, 3);
    ?>
</body>

</html>