<?php

class Method
{
    private $connection;

    public function __construct(string $serverName, string $dbName, string $username, string $password)
    {
        $this->openConnection($serverName, $dbName, $username, $password);
    }

    private function openConnection(string $serverName, string $dbName, string $username, string $password)
    {
        try {
            $dsn = "mysql:host={$serverName};dbname={$dbName};charset=utf8";
            $this->connection = new PDO($dsn, $username, $password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function showPlayers($teamName)
    {
        try {
            $sqlString =
                "SELECT players.playerId, players.firstName, players.lastName, players.dateOfBirth, players.position, players.jerseyNumber, players.pointsScored
                FROM players
                JOIN teams ON players.teamId = teams.teamId
                WHERE teams.teamName = ?";

            $query = $this->connection->prepare($sqlString);
            $query->execute([$teamName]);

            $players = [];

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $player = new Player(
                    $row["playerId"],
                    $row["firstName"],
                    $row["lastName"],
                    new DateTime($row["dateOfBirth"]),
                    $row["position"],
                    $row["jerseyNumber"],
                    $row["pointsScored"]
                );
                $players[] = $player;
            }

            return ["players" => $players];
        } catch (PDOException $e) {
            header("HTTP/1.1 500 Internal Server Error");
            return ["error" => "Internal Server Error: " . $e->getMessage()];
        }
    }
    public function teamList()
    {
        try {
            $sqlString = "SELECT teamName, city FROM teams;";
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

    public function deleteTeam($teamName)
    {
        try {
            $this->connection->beginTransaction();
            $sqlString = "DELETE FROM teams WHERE teamName=?";
            $query = $this->connection->prepare($sqlString);
            $query->bindParam(1, $teamName);
            $query->execute();
            $this->connection->commit();

            // Check if the deletion was successful and return a boolean value
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            throw new Exception("" . $e->getMessage());
        }
    }
}

// Open connection
try {
    $operation = new Method("localhost", "gaelic", "gaelicUser", "abc123.");
} catch (Exception $e) {
    echo "" . $e->getMessage();
}
