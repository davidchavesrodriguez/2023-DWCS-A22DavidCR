<?php
require_once("Student.php");
error_reporting(E_ALL);

// -Connection conn
// +openConnection()
// +closeConnection()

class OperationsDb
{
    private $conn;

    public function openConnection()
    {
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

    public function __construct()
    {
        $this->openConnection();
    }
    public function closeConnection()
    {
        $this->conn = null;
    }

    // +int addStudent(Student student) --> 
    // It inserts a new student in the database
    public function addStudent($student)
    {
        try {
            $this->conn->beginTransaction();
            $sqlString = "INSERT INTO student(dni, name, surname, age)
                            VALUES (?, ?, ?, ?)";

            $stmt = $this->conn->prepare($sqlString);

            // $id = $student->getId();
            $dni = $student->getDni();
            $name = $student->getName();
            $surname = $student->getSurname();
            $age = $student->getAge();



            // $stmt->bindParam(1, $id);
            $stmt->bindParam(1, $dni);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $surname);
            $stmt->bindParam(4, $age);

            $stmt->execute();
            $this->conn->commit();
            $numberOfAddedRows = $stmt->rowCount();

            return $numberOfAddedRows;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }
    // +Student getStudent(String dni) --> 
    //  It selects a student with that dni and it returns a Student object with the data
    public function getStudent($dni)
    {
        try {
            $sqlString = "SELECT dni, name, surname, age FROM student WHERE dni=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$dni]);

            if ($query->rowCount() > 0) {
                $student = $query->fetch();
                $myStudent = new Student(
                    $student["dni"],
                    $student["name"],
                    $student["surname"],
                    $student["age"]
                );
                return $myStudent;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
    // +int deleteStudent(String dni) --> 
    // It deletes the student with that dni
    public function deleteStudent($dni)
    {
        try {
            $this->conn->beginTransaction();

            $sqlString = "DELETE FROM student WHERE dni=?";

            $stmt = $this->conn->prepare($sqlString);

            $stmt->bindParam(1, $dni);

            $stmt->execute();
            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    // +int modifyStudent(Student student) --> 
    // It uses the student dni to search for it in the DB, it modifies its data 
    // using the rest of the object attributes.
    public function modifyStudent($student)
    {
        try {
            $this->conn->beginTransaction();
    
            $sqlString = "UPDATE student SET name=?, surname=?, age=? WHERE dni=?";
    
            $stmt = $this->conn->prepare($sqlString);
    
            $dni = $student->getDni();
            $name = $student->getName();
            $surname = $student->getSurname();
            $age = $student->getAge();
    
            $stmt->execute([$name, $surname, $age, $dni]);
    
            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollBack();
            throw $e;
        }
    }

    // +array studentsList() --> 
    // It returns an array with all the students in the database.
    public function studentsList()
    {
        try {
            $sqlString = "SELECT dni, name, surname, age FROM student";
            $query = $this->conn->prepare($sqlString);
            $query->execute();    
            $result= $query->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        } catch (PDOException $e) {
            return ["error" => $e->getMessage()];
        }
    }
    
    
}
