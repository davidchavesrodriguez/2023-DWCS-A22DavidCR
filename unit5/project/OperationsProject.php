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
        $password = "";
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
}
