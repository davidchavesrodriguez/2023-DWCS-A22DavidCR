<?php

/*Create a page with two functions:

    1. tripleCheck

    This function receives an array of integers and returns a boolean indicating if a triple is present in that array or not. If a value appears three times in a row in an array it is called a triple.

    Sample Input:
    { 1, 1, 2, 2, 1 }
    { 1, 1, 2, 1, 2, 3 }
    { 1, 1, 1, 2, 2, 2, 1 }
    Sample Output:
    bool(false)
    bool(false)
    bool(true)

    2. countries 

    Tthis function receives an arrai with pairs country - capital and shows a description on the screen as below:

    $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

    Sample Output :

    The capital of Netherlands is Amsterdam 
    The capital of Greece is Athens 
    The capital of Germany is Berlin 

    3. PHP page

    Write the code of the page so that both functions are invoked and so that we can see the results.*/

//Triples
$arr1 = [1, 1, 2, 2, 1];
$arr2 = [1, 1, 2, 1, 2, 3];
$arr3 = [1, 1, 1, 2, 2, 2, 1];

function arrayTriples(array $arr)
{
    $triple = false;

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $arr[$i + 1] && $arr[$i] == $arr[$i + 2]) {
            $triple = true;
            return var_export($triple);
            break;
        } else {
            return var_export($triple);
        }
    }
}

//Countries
$countries = array(
    "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium"
    => "Brussels", "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" =>
    "Paris", "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" =>
    "Berlin", "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands"
    => "Amsterdam", "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" =>
    "Stockholm", "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania"
    => "Vilnius", "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary"
    => "Budapest", "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna",
    "Poland" => "Warsaw"
);

function countryCapital(array $arr)
{
    foreach ($arr as $country => $capital) {
        echo $capital, " is the capital of ", $country;
        echo "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //Triples
    echo arrayTriples($arr1);
    echo "<br>";
    echo arrayTriples($arr2);
    echo "<br>";
    echo arrayTriples($arr3);
    echo "<br>";

    //Countries
    echo countryCapital($countries);
    ?>
</body>

</html>