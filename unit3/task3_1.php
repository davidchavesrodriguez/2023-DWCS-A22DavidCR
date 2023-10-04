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

    $number = 5;
    $value = 1;
    for ($i = $number; $i > 1; $i--) {
        $value = $value * $i;
    }

    echo "<h4>The factorial value of ", $number, " is: ", $value, "<h4>";
    ?>
</body>

</html>