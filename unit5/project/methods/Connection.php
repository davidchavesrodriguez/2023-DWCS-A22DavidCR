<?php

class Connection
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

    public function __construct()
    {
        $this->openConnection();
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}