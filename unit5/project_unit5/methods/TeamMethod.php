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

    public function getTeam($teamName)
    {
        try {
            $sqlString = "SELECT teamId, teamName, city, foundedYear, homeStadium FROM teams WHERE teamName=:teamName;";
            $query = $this->connection->prepare($sqlString);
            $query->execute([':teamName' => $teamName]);

            if ($query->rowCount() > 0) {
                $team = $query->fetchObject('Team');
                return $team;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            // echo "Error: " . $e->getMessage();
            return null;
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
