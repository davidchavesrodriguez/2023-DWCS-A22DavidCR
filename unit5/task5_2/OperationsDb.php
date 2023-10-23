<?php
error_reporting(E_ALL);
Class OperationsDb{
    private $conn;

    public function openConnection(){
        $servername = "localhost";
        $username = "manager";
        $password = "abc123.";
        $dbName = "school";

        $this->conn = new PDO(
            "mysql:host=$servername;dbname=$dbName",
            $username,
            $password
        );

        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function closeConnection(){
        $this->conn = null;
    }

    public function addStudent(Student $student)
    {
        try {
            $this->conn->beginTransaction();

            $sqlString = "INSERT INTO student(dni, name, surname, age)
                            VALUES (?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sqlString);

            $id = $student->getId();
            $dni = $student->getDni();
            $name = $student->getName();
            $surname = $student->getSurname();
            $age = $student->getAge();



            $stmt->bindParam(1, $id);
            $stmt->bindParam(2, $dni);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $surname);
            $stmt->bindParam(5, $age);

            $stmt->execute();
            $numberOfAddedRows = $stmt->rowCount();

            $this->conn->commit();

            return $numberOfAddedRows;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }
}
