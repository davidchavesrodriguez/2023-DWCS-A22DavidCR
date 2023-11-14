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
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data" class="buttons">
            <button type="submit" name="getTeam">Team Details</button>
            <button type="submit" name="getPlayers">Players</button>
            <button type="submit" name="addTeam">Add New Team</button>
            <button type="submit" name="deleteTeam">Delete Team</button>
            <button type="submit" name="federationPage"><a href="https://gaelicogalego.gal/">Federation
                    Page</a></button>
        </form>
    </nav>

    <?php
    include("./classes/Player.php");
    include("./classes/Team.php");
    include("./methods/Connection.php");
    include("./methods/TeamMethod.php");
    include("./methods/PlayerMethod.php");

    $teamMethod = new TeamMethod();
    $playerMethod = new PlayerMethod();

    function test_input($data)
    {
        if (empty($data)) {
            echo "ERROR: FIELD CAN NOT BE EMPTY";
        } else {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    // Show Team Data
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getTeam"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='showTeamSubmitText'>Name of the team you want to check data: </label>";
        echo "<input type='text' id='showTeamSubmitText' name='showTeamSubmitText' />";
        echo "<input type='submit' name='showTeamSubmit' value='Show Team' />";
        echo "</form>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["showTeamSubmit"])) {
        echo "<form>";
        echo "<h2>Team Details for Turonia </h2>";
        echo "<p>Team ID: 2</p>";
        echo "<p>City: Gondomar</p>";
        echo "<p>Founded Year: 2018</p>";
        echo "<p>Home Stadium: Gándara de Chaín</p>";
        echo "</form>";
        $teamNameInput = test_input($_POST["showTeamSubmitText"]);
        $team = $teamMethod->getTeam($teamNameInput);
        if ($team) {
            echo "<h2>Team Details for " . $team->getTeamName() . "</h2>";
            echo "<p>Team ID: " . $team->getTeamId() . "</p>";
            echo "<p>City: " . $team->getCity() . "</p>";
            echo "<p>Founded Year: " . $team->getFoundedYear() . "</p>";
            echo "<p>Home Stadium: " . $team->getHomeStadium() . "</p>";
        } else {
            echo "<p>There is no such team</p>";
        }
    }



    //Add Team
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addTeam"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='teamName'>Name of the team you want to add: </label>";
        echo "<input type='text' id='teamName' name='teamName' /><br><br>";
        echo "<label for='city'>City: </label>";
        echo "<input type='text' id='city' name='city' /><br><br>";
        echo "<label for 'foundedYear'>Founded Year: </label>";
        echo "<input type='text' id='foundedYear' name='foundedYear' /><br><br>";
        echo "<label for='homeStadium'>Home Stadium: </label>";
        echo "<input type='text' id='homeStadium' name='homeStadium' /><br><br>";
        echo "<input type='submit' name='submitAddTeam' value='Add Team' />";
        echo "</form>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitAddTeam"])) {
        $newTeam = new Team(
            test_input($_POST["teamName"]),
            test_input($_POST["city"]),
            test_input($_POST["foundedYear"]),
            test_input($_POST["homeStadium"])
        );

        $addedRows = $teamMethod->addTeam($newTeam);

        if ($addedRows > 0) {
            echo "Team added successfully.";
        } else {
            echo "Failed to add the team.";
        }
    }


    //Show all players
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getPlayers"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='getTeamSubmit'>Name of the team you want to check players: </label>";
        echo "<input type='text' id='getTeamSubmit' name='getTeamSubmit' />";
        echo "<input type='submit' name='getPlayers' value='Get Players' />";
        echo "</form>";

        if (isset($_POST["getTeamSubmit"])) {
            $teamName = test_input($_POST["getTeamSubmit"]);
            $players = $playerMethod->showPlayers($teamName);

            if ($players) {
                echo "<div class='player-details'>";
                foreach ($players as $player) {
                    echo "<div class='player-card'>";
                    echo "<h2>{$player->getPlayerName()}</h2>";
                    echo "<p><strong>Player ID:</strong> {$player->getPlayerId()}</p>";
                    echo "<p><strong>Last Name:</strong> {$player->getLastName()}</p>";
                    echo "<p><strong>Date of Birth:</strong> {$player->getDateOfBirth()->format('Y-m-d')}</p>";
                    echo "<p><strong>Position:</strong> {$player->getPosition()}</p>";
                    echo "<p><strong>Jersey Number:</strong> {$player->getJerseyNumber()}</p>";
                    echo "<p><strong>Points Scored:</strong> {$player->getPointsScored()}</p>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
    }

    // Delete Team
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteTeam"])) {
        echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='POST' enctype='multipart/form-data'>";
        echo "<br><label for='deleteTeamSubmit'>Name of the team you want to DELETE: </label>";
        echo "<input type='text' id='deleteTeamSubmit' name='deleteTeamSubmit' /><br><br>";
        echo "<input type='submit' name='deleteTeam' value='Destroy' />"; // Change the button name
        echo "</form>";
        if (isset($_POST["deleteTeamSubmit"])) {
            $deleteTeam = test_input($_POST["deleteTeamSubmit"]);
            $deleted = $teamMethod->deleteTeam($deleteTeam);

            if ($deleted) {
                echo "Team deleted successfully.";
            } else {
                echo "Failed to delete the team.";
            }
        }
    }

    // Show All Teams
    echo "<main>";
    echo "<img src='./images/gaelicgal.png' alt='pattern'>";
    $teamList = $teamMethod->teamList();
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
    echo "<img src='./images/gaa.jpg' alt='pattern'>";
    echo "</main>";
    ?>
</body>

</html>