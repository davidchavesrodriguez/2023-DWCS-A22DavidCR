<?php

class MyGuests{

//Attributes
private $id;
private $firstname;
private $lastname;
private $email;
private $reg_date;

//Constructor

// public function __construct($firstname="", $lastname="", $email="", $reg_date=null, $id=0){
// $this->firstname = $firstname;
// $this->lastname = $lastname;
// $this->email = $email;
// $this->reg_date = $reg_date;
// $this->id = $id;
// }

//Getters and Setters

public function getId(){
return $this->id;
}
public function getFirstname(){
return $this->firstname;
}
public function getLastname(){
return $this->lastname;
}
public function getEmail(){
return $this->email;
}
public function getregDate(){
return $this->reg_date;
}

public function setId($id){
$this->id = $id;
}

public function setFirstname($firstname){
$this->firstname = $firstname;
}
public function setLastname($lastname){
$this->lastname = $lastname;
}
public function setEmail($email){
$this->email = $email;
}
public function setRegdate($reg_date){
$this->reg_date = $reg_date;
}

//toString method

public function __toString()
{
    return "Id: " . $this->id . "<br>"
        . "First Name: " . $this->firstname . "<br>"
        . "Last Name: " . $this->lastname . "<br>"
        . "Email: " . $this->email . "<br>"
        . "Date: " . $this->reg_date . "<br>";
}


}
