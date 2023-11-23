<?php
class Database
{
    private $connection;
    public function __construct(
        private string $serverName,
        private string $dbName,
        private string $username,
        private string $password
    ) {
        try {
            $dsn = "mysql:host={$this->serverName};dbname={$this->dbName};charset=utf8";
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        if (!$this->connection) {
            $dsn = "mysql:host={$this->serverName};dbname={$this->dbName};charset=utf8";
            $this->connection = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        }

        return $this->connection;
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
