<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galician Gaelic League</title>
    <link rel="icon" href="images/logoGaelicoGalego.ico" type="image/x-icon">
    <link rel="stylesheet" type="" href="styleProject.css">
</head>

<body>
    <h1>Galician Gaelic League</h1>

    <button type="submit">Team Details</button>
    <button type="submit">Players</button>
    <button type="submit">Add Team</button>
    <button type="submit">Delete Team</button>
    <button type="submit">Federation Page</button>

    <?php
    require_once("OperationsProject.php");
    error_reporting(E_ALL);

    $operation = new OperationsProject();
    $teamList = $operation->teamList();

    //Show gaelic teams
    echo "<table>";
    echo "  <tr>";
    echo "    <th>TEAM</th>";
    echo "    <th>CITY</th>";
    echo "  </tr>";
    foreach ($teamList as $team) {
        echo "<tr class='hover'>";
        echo "  <td>" . $team["teamName"] . "</td>";
        echo "  <td>" . $team["city"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
</body>

</html>