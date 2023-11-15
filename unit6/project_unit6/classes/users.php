<?php

class User
{
    private $connection;
    private int $userId;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function checkUsers($username, $password)
    {
        $sqlString = "SELECT * FROM users WHERE username=? AND password=?";
        $query = $this->connection->prepare($sqlString);
        $query->execute([$username, $password]);

        if ($query->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}