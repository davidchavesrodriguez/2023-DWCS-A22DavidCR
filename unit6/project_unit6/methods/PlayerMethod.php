<?php
class PlayerMethod
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connection();
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

            return $players;
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
}

// Open connection
try {

    $operation = new Connection();
} catch (Exception $e) {
    echo "" . $e->getMessage();
}
