<?php
class Login
{
    private int $userId;
    private string $username;
    private string $password;

    public function __construct($username, $password, $userId = 0)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
    }
}
