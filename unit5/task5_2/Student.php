<?php 
error_reporting(E_ALL);

Class Student{

    private $id;
    private $dni;
    private $name;
    private $surname;
    private $age;

    public function __construct(String $dni, String $name, String $surname, int $age, int $id=null){
        $this->id = $id;
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of dni
     */
    public function getDni() {
        return $this->dni;
    }

    /**
     * Set the value of dni
     */
    public function setDni($dni): self {
        $this->dni = $dni;
        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of surname
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set the value of surname
     */
    public function setSurname($surname): self {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get the value of age
     */
    public function getAge() {
        return $this->age;
    }

    /**
     * Set the value of age
     */
    public function setAge($age): self {
        $this->age = $age;
        return $this;
    }

    public function __toString()
{
    return "Id: " . $this->id . "<br>"
        . "First Name: " . $this->id . "<br>"
        . "Last Name: " . $this->dni . "<br>"
        . "Email: " . $this->name . "<br>"
        . "Date: " . $this->surname . "<br>"
        . "Date: " . $this->age . "<br>";
}
}
