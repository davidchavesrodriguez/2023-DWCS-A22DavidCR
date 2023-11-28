<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: lightcyan;
    }

    table {
        width: 70%;
        background-color: aliceblue;
    }

    table,
    tr,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    tr:hover {
        background-color: white;
        font-weight: bolder;
    }
    </style>
</head>
<!-- Create a multidimensional array that contains the days of the week in different languages:

Español: {lunes, martes, miércoles, jueves, viernes, sábado, domingo}

English: {Monday, Tuesday, …

Français: {lundi, mardi, mercredi, …

Using the foreach structure show the contents of the array using a nice format, withouth any bracket.-->


<body>
    <?php
    $languages = array(
        "Galego" => array("Luns", "Martes", "Mércores", "Xoves", "Venres", "Sábado", "Domingo"),
        "English" => array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"),
        "Deutsch" => array("Montag", "Diesntag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag")
    );
    ?>
    <h1>Languages, my dear</h1>
    <table>
        <tr>
            <th>Language</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
        </tr>
        <?php
        foreach ($languages as $language => $days) {
            echo "<tr>";
            echo "<td>{$language}</td>";
            foreach ($days as $day) {
                echo "<td>{$day}</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>