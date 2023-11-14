<?php
// DBOperations.php
//It interacts with the database. There is no user interaction in this file. Use classes

// Use a class "Login" that maps the table "login".
class Operations
{
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'dbname';
        $username = 'loginUser';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$dbname";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function getPdo()
    {
        return $this->pdo;
    }

    public function setPdo($pdo): self
    {
        $this->pdo = $pdo;
        return $this;
    }
}

class Login
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function validateUser($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        return ($user !== false);
    }
}

class Example
{
    private $code;
    private $description;

    public function __construct($code, $description)
    {
        $this->code = $code;
        $this->description = $description;
    }
}
