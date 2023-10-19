<?php 
error_reporting(-1);

class myGuests{
private $id;
private $firstName;
private $lastName;
private $email;
private $reg_date;

public function __construct($firstName, $lastName, $email, $reg_date=null, $id=null){
    $this->id= $id;
    $this->firstName= $firstName;
    $this->lastName= $lastName;
    $this->email= $email;
    $this->reg_date= $reg_date;
}

public function __toString(){
    $str= "<br>ID: ". $this->id. "<br>First Name: ". $this->firstName;
    $str= "<br>Last Name: ". $this->lastName. "<br>Email: ". $this->email;
    $str= "<br>Date: ". $this->reg_date;
    return $str;
}

public function getId() {
return $this->id;
}


public function setId($id): self {
$this->id = $id;
return $this;
}


public function getFirstName() {
return $this->firstName;
}


public function setFirstName($firstName): self {
$this->firstName = $firstName;
return $this;
}


public function getLastName() {
return $this->lastName;
}


public function setLastName($lastName): self {
$this->lastName = $lastName;
return $this;
}


public function getEmail() {
return $this->email;
}


public function setEmail($email): self {
$this->email = $email;
return $this;
}


public function getRegDate() {
return $this->reg_date;
}


public function setRegDate($reg_date): self {
$this->reg_date = $reg_date;
return $this;
}
}
