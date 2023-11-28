<?php

class Patient implements JsonSerializable
{
    //Creation of the attributes of all the patients.

    private $id;
    private $name;
    private $surname;
    private $dni;
    private $nhc;
    private $birthdate;

    //Creation of the constructor of the class Patient

    public function __construct(String $name, String $surname, String $dni, String $nhc, String $birthdate)
    {
        if (strlen($name) == 0 || strlen($name) > 20) {
            throw new \InvalidArgumentException("The name can't have that value!");
        } else {
            $this->name = $name;
        }

        if (strlen($surname) == 0 || strlen($surname) > 150) {
            throw new \InvalidArgumentException("The surname can't have that value!");
        } else {
            $this->surname = $surname;
        }

        if (strlen($dni) != 9) {
            throw new \InvalidArgumentException("The dni must have 9 characters!");
        } else {
            $this->dni = $dni;
        }

        if (strlen($nhc) != 8) {
            throw new \InvalidArgumentException("The nhc must have 8 characters!");
        } else {
            $this->nhc = $nhc;
        }

        $this->birthdate = $birthdate;
    }

    //Getter and Setter methods

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getNhc()
    {
        return $this->nhc;
    }

    public function getBirthday()
    {
        return $this->birthdate;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setNhc($nhc)
    {
        $this->nhc = $nhc;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    //Create the toString method to print all the attributtes of the object Patient

    public function __toString()
    {
        return "ID: " . $this->getId() . "<br>Name: " . $this->getName() . "<br>Surname: " . $this->getSurname() .
            "<br>DNI: " . $this->getDni() . "<br>NHC: " . $this->getNhc() . "<br>Birthdate: " . $this->getBirthday();
    }

    public function jsonSerialize(): mixed{
        return [
            "name" => $this->name,
            "surname"=> $this->surname,
            "dni"=> $this->dni,
            "nhc"=> $this->nhc,
            "birthdate"=> $this->birthdate
        ];
    }
}