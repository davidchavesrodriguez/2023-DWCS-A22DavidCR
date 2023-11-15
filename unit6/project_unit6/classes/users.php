<?php
require_once(__DIR__ . '/../methods/Connection.php');


class User
{
    private $connectionUser;
    private int $userId;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->connectionUser = new Connection();
    }

    public function checkUsers($username, $password)
    {
        $sqlString = "SELECT * FROM users WHERE username=? AND password=?";
        $query = $this->connectionUser->prepare($sqlString);
        $query->execute([$username, $password]);

        if ($query->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
}
