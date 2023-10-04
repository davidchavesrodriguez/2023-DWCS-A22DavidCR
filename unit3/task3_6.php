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

    We have the information following the schema: City, Country, Continent 
    stored in a string:

    $information="Tokyo,Japan,Asia;Mexico City,Mexico,America;New York City,
    USA,America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,
    Nigeria,Africa;Buenos Aires,Argentina,America;Cairo,Egypt,Africa;London,UK,
    Europe"

    Show that information organized in a table with three columns: City, 
    Country, Continent.
    */

    $information = "Tokyo,Japan,Asia;Mexico City,Mexico,America;New York City,USA,America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,America;Cairo,Egypt,Africa;London,UK,Europe";

    //We separate the string in groups of three
    $entries = explode(";", $information);

    //We create the table
    echo " <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        </style>";

    echo "<table>";
    echo "<tr><th>CITY</th><th>COUNTRY</th><th>CONTINENT</th></tr>";

    //We totally separate the entries
    foreach ($entries as $entry) {
        $finalData = explode(",", $entry);
        echo "<tr>";
        //We add the data to the table
        foreach ($finalData as $element) {
            echo "<td>", $element, "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>