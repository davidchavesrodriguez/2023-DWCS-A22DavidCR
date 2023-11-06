<?php
require_once("Player.php");
require_once("Team.php");
class OperationsProject
{

    private $connection;
    public function openConnection()
    {
        $serverName = "localhost";
        $username = "gaelicUser";
        $password = "abc123.";
        $dbName = "gaelic";

        $this->connection = new PDO(
            "mysql:host=$serverName;dbname=$dbName",
            $username,
            $password
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function __construct()
    {
        $this->openConnection();
    }

    public function closeConnection()
    {
        $this->connection = null;
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
    // public function getStudent($dni)
    // {
    //     try {
    //         $sqlString = "SELECT dni, name, surname, age FROM student WHERE dni=?";
    //         $query = $this->conn->prepare($sqlString);
    //         $query->execute([$dni]);

    //         if ($query->rowCount() > 0) {
    //             $student = $query->fetch();
    //             $myStudent = new Student(
    //                 $student["dni"],
    //                 $student["name"],
    //                 $student["surname"],
    //                 $student["age"]
    //             );
    //             return $myStudent;
    //         } else {
    //             return null;
    //         }
    //     } catch (PDOException $e) {
    //         return ["error" => $e->getMessage()];
    //     }
    // }

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
