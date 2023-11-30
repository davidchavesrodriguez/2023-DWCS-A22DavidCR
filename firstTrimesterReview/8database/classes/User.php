<?php

class User implements JsonSerializable
{
    public function __construct(
        private int $id,
        private string $dni,
        private string $name,
        private string $address,
        private string $login,
        private string $password
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDni(): string
    {
        return $this->dni;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    public function __toString(): string
    {
        return "User [ID: {$this->id}, DNI: {$this->dni}, Name: {$this->name}, Address: {$this->address}, Login: {$this->login}]";
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'dni' => $this->dni,
            'name' => $this->name,
            'address' => $this->address,
            'login' => $this->login,
        ];
    }
}
