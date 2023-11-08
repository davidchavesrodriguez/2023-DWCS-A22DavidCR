<?php

// playerId (Primary Key): Unique identifier for each player.
// firstName: The first name of the player.
// lastName: The last name of the player.
// dateOfBirth: The player's date of birth.
// position: The player's position (e.g., forward, midfielder, defender).
// jerseyNumber: The player's jersey number.
// pointsScored: The total points scored by the player.
// teamId (Foreign Key): A reference to the team to which the player belongs.
class Player
{
    private int $playerId;
    private string $playerName;
    private string $lastName;
    private DateTime $dateOfBirth;
    private string $position;
    private int $jerseyNumber;
    private int $pointsScored;
    private int $teamId;

    public function __construct(
        int $playerId,
        string $playerName,
        string $lastName,
        DateTime $dateOfBirth,
        string $position,
        int $jerseyNumber,
        int $teamId,
        int $pointsScored = 0 // There is no player with points scored before being in the Fedetarion!
    ) {
        $this->playerId = $playerId;
        $this->playerName = $playerName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->position = $position;
        $this->jerseyNumber = $jerseyNumber;
        $this->teamId = $teamId;
        $this->pointsScored = $pointsScored;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): self
    {
        $this->playerId = $playerId;
        return $this;
    }

    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    public function setPlayerName(string $playerName): self
    {
        $this->playerName = $playerName;
        return $this;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }


    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(DateTime $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getJerseyNumber(): int
    {
        return $this->jerseyNumber;
    }

    public function setJerseyNumber(int $jerseyNumber): self
    {
        $this->jerseyNumber = $jerseyNumber;
        return $this;
    }

    public function getPointsScored(): int
    {
        return $this->pointsScored;
    }

    public function setPointsScored(int $pointsScored): self
    {
        $this->pointsScored = $pointsScored;
        return $this;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): self
    {
        $this->teamId = $teamId;
        return $this;
    }
}
?>

<?php
// teamId (Primary Key): Unique identifier for each team.
// teamName: The name of the Gaelic Football team.
// city: The city where the team is based.
// foundedYear: The year the team was founded.
// homeStadium: The stadium where the team plays its home games.

class Team
{
    private int $teamId;
    private string $teamName;
    private string $city;
    private int $foundedYear;
    private string $homeStadium;

    public function __construct($teamId, $teamName, $city, $foundedYear, $homeStadium)
    {
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->city = $city;
        $this->foundedYear = $foundedYear;
        $this->homeStadium = $homeStadium;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }
    public function setTeamId()
    {
        $this->teamId = (int) $this->teamId;
        return $this;
    }

    public function getTeamName(): string
    {
        return $this->teamName;
    }
    public function setTeamName(string $teamName)
    {
        $this->teamName = $teamName;
        return $this;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }
    public function getFoundedYear(): int
    {
        return $this->foundedYear;
    }
    public function setFoundedYear(int $foundedYear)
    {
        $this->foundedYear = $foundedYear;
        return $this;
    }
    public function getHomeStadium(): string
    {
        return $this->homeStadium;
    }
    public function setHomeStadium(string $homeStadium)
    {
        $this->homeStadium = $homeStadium;
        return $this;
    }
    public function __toString(): string
    {
        return sprintf(
            " ",
            $this->teamId,
            $this->teamName,
            $this->city,
            $this->foundedYear,
            $this->homeStadium
        );
    }
}
?>

<?php

class Connection
{
    private $connection;
    private $serverName = "localhost";
    private $username = "gaelicUser";
    private $password = "abc123.";
    private $dbName = "gaelic";

    public function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=$this->serverName;dbname=$this->dbName",
                $this->username,
                $this->password
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function prepare($sqlString)
    {
        return $this->connection->prepare($sqlString);
    }

    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    public function commit()
    {
        $this->connection->commit();
    }

    public function rollBack()
    {
        $this->connection->rollBack();
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}
?>

<?php
class TeamMethod
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function teamList()
    {
        try {
            $sqlString = "SELECT teamName, city, homeStadium FROM teams;";
            $query = $this->connection->prepare($sqlString);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
    public function addTeam($team)
    {
        try {
            $this->connection->beginTransaction();
            $sqlString = "INSERT INTO teams(teamName, city, foundedYear, homeStadium) VALUES (?, ?, ?, ?);";
            $query = $this->connection->prepare($sqlString);

            $teamName = $team->getTeamName();
            $city = $team->getCity();
            $foundedYear = $team->getFoundedYear();
            $homeStadium = $team->getHomeStadium();

            $query->bindParam(1, $teamName, PDO::PARAM_STR);
            $query->bindParam(2, $city, PDO::PARAM_STR);
            $query->bindParam(3, $foundedYear, PDO::PARAM_INT);
            $query->bindParam(4, $homeStadium, PDO::PARAM_STR);

            $query->execute();
            $this->connection->commit();
            $numberOfAddedRows = $query->rowCount();
            return $numberOfAddedRows;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            throw new Exception("Error al agregar el equipo: " . $e->getMessage());
        }
    }

    public function getTeam($teamName)
    {
        try {
            $sqlString = "SELECT teamId, teamName, city, foundedYear, homeStadium FROM teams WHERE teamName=?;";
            $query = $this->connection->prepare($sqlString);
            $query->execute([$teamName]);

            if ($query->rowCount() > 0) {
                $team = $query->fetch();
                $showTeam = new Team(
                    $team["teamId"],
                    $team["teamName"],
                    $team["city"],
                    $team["foundedYear"],
                    $team["homeStadium"]
                );
                return $showTeam;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
?>

<?php
error_reporting(E_ALL);

// Open connection
try {

    $operation = new Connection();
} catch (Exception $e) {
    echo "" . $e->getMessage();
}

$teamMethod = new TeamMethod();


?>

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
            <button type="submit" name="addTeam">Add New Team</button>
            <button type="submit" name="deleteTeam">Delete Team</button>
            <button type="submit" name="federationPage"><a href="https://gaelicogalego.gal/">Federation
                    Page</a></button>
        </form>
    </nav>


    <?php

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
        $team = $teamMethod->getTeam($teamName);
        if ($team) {
            echo "<h2>Team Details for {$team->getTeamName()}</h2>";
            echo "<p><strong>City:</strong> {$team->getCity()}</p>";
            echo "<p><strong>Founded Year:</strong> {$team->getFoundedYear()}</p>";
            echo "<p><strong>Home Stadium:</strong> {$team->getHomeStadium()}</p>";
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
            $_POST["teamName"],
            $_POST["city"],
            $_POST["foundedYear"],
            $_POST["homeStadium"]
        );

        $addedRows = $teamMethod->addTeam($newTeam);

        if ($addedRows > 0) {
            echo "Team added successfully.";
        } else {
            echo "Failed to add the team.";
        }
    }

    // Show All Teams
    $teamList = $teamMethod->teamList();
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