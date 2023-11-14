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
