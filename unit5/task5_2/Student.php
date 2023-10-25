<?php 
error_reporting(E_ALL);
// Create a database “school”.
// --> create database school
// Create a user called “manager” with privileges to manage tables in the previous database.
// create user ‘manager’@’localhost’ identified by ‘abc123.’; 
// create user ‘manager’@’%’ identified by ‘abc123.’; 
// grant all on school.* to manager@'localhost';
// grant all on school.* to manager@'%';

// create table student (id int auto_increment primary key, dni char(9), name varchar(50), surname varchar(250), age int);
// insert into student (dni, name, surname, age) values (‘11111111A’,’Draco’,’Malfoy’,25);
// insert into student (dni, name, surname, age) values (‘22222222B’,’Hermione’,’Granger’,23);
// insert into student (dni, name, surname, age) values (‘33333333C’,’Harry’,’Potter’,20);
// insert into student (dni, name, surname, age) values (‘44444444D’,’Ron’,’Weasley’,22);

// Student 
// -int id
// -String dni
// -String name
// -String surname
// -int age
// +Student(...)
// ... other necessary methods

class Student{

    private int $id;
    private string $dni;
    private string $name;
    private string $surname;
    private int $age;

    public function __construct( $dni,  $name="",  $surname="",  $age=0,  $id=0){
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->id = $id;
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
    return"<b>DNI:</b> " . $this->dni . "<br>"
        . "<b>NAME:</b> " . $this->name . "<br>"
        . "<b>SURNAME:</b> " . $this->surname . "<br>"
        . "<b>AGE:</b> " . $this->age . "<br>";
}
}
