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

    public function getUserId(): int {
        return $this->userId;
    }

    public function setUserId(int $userId): self {
        $this->userId = $userId;
        return $this;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): self {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }
}
