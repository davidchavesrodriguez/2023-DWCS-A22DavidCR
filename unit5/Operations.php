<?php
    include("MyGuests.php");



class Operations{
    private $conn;
    public function openConnection(){
        $servername = "localhost";
        $username = "userweb";
        $password = "abc123.";
        $dbName = "exemplo";
        $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<h3 style=color:#880808>Connected successfully</h3>";
    }

    public function closeConnection(){
        $conn= null;
    }

    public function __construct(){
        $this->openConnection();
    }

    public function addUser($myGuest){
        try{
            $this->conn->beginTransaction();
            $sqlString= "INSERT INTO MyGuests(firstname, lastname, email, reg_date) 
            values (?, ?, ?, ?)";
            $statement= $this->conn->prepare($sqlString);

            $firstName= $myGuest->getFirstName();
            $lastName= $myGuest->getLastName();
            $email= $myGuest->getEmail();
            $reg_date= $myGuest->getRegDate();

            $statement->bindParam(1, $firstName);
            $statement->bindParam(2, $lastName);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $reg_date);

            $statement->execute();
            $this->conn->commit();
            $numberOfAddedRows= $statement->rowCount();
            return $numberOfAddedRows;
            }

        catch(PDOException $e){
            $this->conn->rollBack();
            throw $e;
        }
    }
}
?>