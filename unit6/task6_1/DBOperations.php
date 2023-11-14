<?php
// DBOperations.php
//It interacts with the database. There is no user interaction in this file. Use classes

// Use a class "Login" that maps the table "login".
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
    private string $dbName = "dbname";

    public function __construct()
    {
        $this->openConnection();
    }

    public function openConnection()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername; dbname=$this->dbName", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } finally {
            $this->closeConnection();
        }
    }

    public function closeConnection()
    {
        unset($this->conn);
    }
}

class Example
{
    private int $code;
    private string $description;

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
    }
}
