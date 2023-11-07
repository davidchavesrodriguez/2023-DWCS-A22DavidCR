<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galician Gaelic League</title>
    <link rel="icon" href="images/logoGaelicoGalego.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styleProject.css">
</head>

<body>
    <h1>Galician Gaelic League</h1>

    <!-- Upper Buttons -->
    <nav>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            <button type="submit" name="getTeam">Team Details</button>
            <button type="submit" name="getPlayers">Players</button>
            <button type="submit" name="addTeam">Add Team</button>
            <button type="submit" name="deleteTeam">Delete Team</button>
            <button type="submit" name="federationPage"><a href="https://gaelicogalego.gal/">Federation
                    Page</a></button>
        </form>
    </nav>

    <?php
    require("methods/Connection.php");
    require("methods/TeamMethod.php");
    error_reporting(E_ALL);

    // Abrimos conexión
    $operation = new Connection();

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Show Team
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getTeam"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='getTeamSubmit'>Name of the team you want to check: </label>";
        echo "<input type='text' id='getTeamSubmit' name='getTeamSubmit' /><br><br>";
        echo "<input type='submit' name='getTeam' value='Get Team' />";
        echo "</form>";
        $teamName = $_POST["getTeamSubmit"];
        $team = $operation->getTeam($teamName);
        if ($team) {
            echo "<h2>Team Details for {$team->getTeamName()}</h2>";
            echo "<p><strong>City:</strong> {$team->getCity()}</p>";
            echo "<p><strong>Founded Year:</strong> {$team->getFoundedYear()}</p>";
            echo "<p><strong>Home Stadium:</strong> {$team->getHomeStadium()}</p>";
        }
    }

    // Add Team
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addTeam"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='teamName'>Name of the team you want to add: </label>";
        echo "<input type='text' id='teamName' name='teamName' /><br><br>";
        echo "<label for='city'>City: </label>";
        echo "<input type='text' id='city' name='city' /><br><br>";
        echo "<label for='foundedYear'>Founded Year: </label>";
        echo "<input type='text' id='foundedYear' name='foundedYear' /><br><br>";
        echo "<label for='homeStadium'>Home Stadium: </label>";
        echo "<input type='text' id='homeStadium' name='homeStadium' /><br><br>";
        echo "<input type='submit' name='submitAddTeam' value='Add Team' />";
        echo "</form>";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitAddTeam"])) {
            $newTeam = new Team(
                null,
                $_POST["teamName"],
                $_POST["city"],
                $_POST["foundedYear"],
                $_POST["homeStadium"]
            );

            $addedRows = $operation->addTeam($newTeam);

            if ($addedRows > 0) {
                echo "Team added successfully.";
            } else {
                echo "Failed to add the team.";
            }
        }
    }


    // Show All Teams
    $teamList = $operation->teamList();
    echo "<table>";
    echo "  <tr>";
    echo "    <th>TEAM</th>";
    echo "    <th>CITY</th>";
    echo "    <th>STADIUM</th>";
    echo "  </tr>";
    foreach ($teamList as $team) {
        echo "<tr class='hover'>";
        echo "  <td>" . $team["teamName"] . "</td>";
        echo "  <td>" . $team["city"] . "</td>";
        echo "  <td>" . $team["homeStadium"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>