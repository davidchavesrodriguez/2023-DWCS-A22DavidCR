<?php

include("MyGuests.php");

class Operations
{

    private $conn;

    public function openConnection()
    {

        $servername = "localhost";
        $username = "userweb";
        $password = "abc123.";
        $dbName = "exemplo";

        $this->conn = new PDO(
            "mysql:host=$servername;dbname=$dbName",
            $username,
            $password
        );

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function closeConn()
    {
        $this->conn = null;
    }

    public function addMyGuest($myGuest)
    {

        try {
            $this->conn->beginTransaction();

            $sqlString = "insert into MyGuests(firstname, lastname, email, reg_date)
values (?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sqlString);


            $firstname = $myGuest->getFirstname();
            $lastname = $myGuest->getLastname();
            $email = $myGuest->getEmail();
            $regDate = $myGuest->getregDate();



            $stmt->bindParam(1, $firstname);
            $stmt->bindParam(2, $lastname);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $regDate);

            $stmt->execute();
            $numberOfAddedRows = $stmt->rowCount();

            $this->conn->commit();

            return $numberOfAddedRows;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {

        try {
            $this->conn->beginTransaction();

            $sqlString = "DELETE FROM MyGuests WHERE id=?";

            $stmt = $this->conn->prepare($sqlString);

            $stmt->bindParam(1, $id);

            $stmt->execute();
            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function update($myGuest)
    {

        try {
            $this->conn->beginTransaction();

            $sqlString = "update MyGuests set firstname=?, lastname=?, email=?, reg_date=? where id=?)";

            $stmt = $this->conn->prepare($sqlString);


            $id = $myGuest->getId();
            $firstname = $myGuest->getFirstname();
            $lastname = $myGuest->getLastname();
            $email = $myGuest->getEmail();
            $regDate = $myGuest->getregDate();

            $stmt->execute([$firstname, $lastname, $email, $regDate, $id]);

            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    // public function getMyGuest($id){
    //     $sqlString = "SELECT id, firstname, lastname, reg_date FROM MyGuests WHERE id=?";
        
    //     $query = $this->conn->prepare($sqlString);
        
    //     $query->execute([$id]);
        
    //     $myGuest = $query->fetchObject("myGuests");

    //     return $myGuest;
    // }

    public function getMyGuest($id)
    {
        $sqlString = "SELECT * FROM MyGuests WHERE id=?";

        $query = $this->conn->prepare($sqlString);

        $query->execute([$id]);

        $table = $myGuest = $query->fetch();
        $myGuest = new myGuests("", "", "");
        $myGuest->setId($table["id"]);
        $myGuest->setFirstname($table["firstname"]);
        $myGuest->setLastname($table["lastname"]);
        $myGuest->setEmail($table["email"]);
        $myGuest->setRegdate($table["reg_date"]);
        return $myGuest;
    }

    public function getAllGuests()
    {
        $sqlString = "SELECT id, firstname, lastname, email, reg_date FROM MyGuests";
        $query = $this->conn->prepare($sqlString);
        $query->execute();
        //Create a list
        $guestList = array();
        while ($myGuest = $query->fetchObject("MyGuests")) {
            $guestList[] = $myGuest;
        }
        return $guestList;
    }

    public function __construct()
    {
        $this->openConnection();
    }
}
