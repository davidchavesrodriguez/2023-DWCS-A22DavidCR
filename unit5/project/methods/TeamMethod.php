<?php
require("./Connection.php");
require("../classes/Team.php");
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
            $query->bindParam(3, $foundedYear, PDO::PARAM_STR);
            $query->bindParam(4, $homeStadium, PDO::PARAM_STR);

            $query->execute();
            $this->connection->commit();
            $numberOfAddedRows = $query->rowCount();
            return $numberOfAddedRows;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

    public function getTeam($teamName)
    {
        try {
            $sqlString = "SELECT teamId, teamName, city, foundedYear, homeStadium FROM teams WHERE teamName=?;";
            $query = $this->connection->prepare($sqlString);
            $query->execute([$teamName]);
            echo "Searching for team: " . $teamName . "<br>";

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
                echo "Team not found.<br>";
                return null;
            }
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
