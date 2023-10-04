<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /*1. Function findString, that receives two strings and returns true if the first string contains the second string.*/

    $str = "Good morning!";
    $pattern = "/Good/i";
    function findString(String $str, String $pattern)
    {
        $found = (preg_match($pattern, $str));
        return var_export($found);
    }
    echo findString($str, $pattern);
    echo "<br>";


    /*2. Function deleteBlanks, that receives a String, removes white characters and new lines from it and returns the new String. */

    function deleteBlanks(String $str)
    {
        $string = preg_replace('/\s+/', '', $str);
        echo $string;
    }
    echo deleteBlanks($str);
    ?>

</body>

</html>