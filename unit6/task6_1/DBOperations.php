<?php
class Login
{
    private int $userId;
    private string $username;
    private string $password;

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function __construct(string $username, string $password, int $userId = 0)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
    }
}

class Operations
{
    private string $servername = "localhost";
    private string $username = "loginUser";
    private string $password = "";
    private string $dbName = "login";

    public function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $conn = null;
    }
}

class Example
{
    private int $code;
    private string $description;
}
