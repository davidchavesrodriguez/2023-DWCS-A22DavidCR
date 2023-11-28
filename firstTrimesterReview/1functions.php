<?php

declare(strict_types=1); ?>
<!-- Write a function called largestNumber:

 - It receives three integer numbers. If the arguments are not integers it must show an error message.

 - The first and second arguments are compulsory. The third argument is optional (default value 5).

 - If one of the numbers is less than zero it must throw an exception.

 - It returns a number with the position of the largest number of the three.

 Write the code that invokes this function and shows the result on a web page. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nums</title>
</head>
ç

<body>
    <h1>Numberins</h1>

    <?php

    function largestNumber(int $num1, ?int $num2, int $num3 = 5)
    {
        try {
            if ($num1 < 0 || $num2 < 0 || $num3 < 0) {
                throw new Exception("Numbers cannot be negative");
            }
            if ($num1 > $num2 && $num1 > $num3) {
                echo "The <b>first one</b> is the highest";
            } elseif ($num2 > $num1 && $num2 > $num3) {
                echo "The highest value is the <b>second one</b>";
            } else {
                echo "Your <b>last value</b> is the highest";
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    largestNumber(1, 2, 3);

    ?>
</body>

</html>