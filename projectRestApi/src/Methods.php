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

    public function getTeam($teamId)
    {
        try {
            $sqlString = "SELECT teamName FROM teams WHERE teamId = ?";
            $query = $this->connection->prepare($sqlString);
            $query->bindParam(1, $teamId, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result ? $result['teamName'] : null;
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
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
            $sqlString = "INSERT INTO teams(teamName, city, foundedYear, homeStadium) VALUES (:teamName, :city, :foundedYear, :homeStadium);";
            $query = $this->connection->prepare($sqlString);

            $teamName = $team->getTeamName();
            $city = $team->getCity();
            $foundedYear = $team->getFoundedYear();
            $homeStadium = $team->getHomeStadium();

            $query->bindParam(':teamName', $teamName, PDO::PARAM_STR);
            $query->bindParam(':city', $city, PDO::PARAM_STR);
            $query->bindParam(':foundedYear', $foundedYear, PDO::PARAM_INT);
            $query->bindParam(':homeStadium', $homeStadium, PDO::PARAM_STR);

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

            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            throw new Exception("" . $e->getMessage());
        }
    }
    public function updateTeam($teamId, $fieldToUpdate, $newValue)
    {
        try {
            $this->connection->beginTransaction();

            $allowedFields = ["city", "foundedYear", "homeStadium"];
            if (!in_array($fieldToUpdate, $allowedFields)) {
                throw new InvalidArgumentException("Invalid field to update");
            }

            $sqlString = "UPDATE teams SET {$fieldToUpdate}=? WHERE teamId=?";
            $query = $this->connection->prepare($sqlString);
            $query->bindParam(1, $newValue);
            $query->bindParam(2, $teamId);
            $query->execute();

            $this->connection->commit();

            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            $this->connection->rollBack();
            throw new Exception("Error updating team: " . $e->getMessage());
        }
    }
}


// Open connection
try {
    $operation = new Method("localhost", "gaelic", "gaelicUser", "abc123.");
} catch (Exception $e) {
    echo "" . $e->getMessage();
}
