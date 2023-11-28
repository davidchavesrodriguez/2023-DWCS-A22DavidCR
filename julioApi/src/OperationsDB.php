<?php

//Activate error reporting for more information of the errors.

error_reporting(E_ALL);

include("Patient.php");

class OperationsDB {

    //Create the variable conn, that represents the connection in the methods of the class.
    private $conn;

    //This function opens a connection.

    public function openConnection() {
        try {
            $servername = "localhost";
            $username = "adminApp";
            $password = "abc123.";
            $dbname = "appointmentsDatabase";

            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //The constructor opens a new connection when a object are created.

    public function __construct() {
        $this->openConnection();
    }

    //This function close the connection.

    public function closeConnection() {
        $this->conn = null;
    }

    //PATIENTS METHODS**************************

    //This function adds a patient to the database.

    public function addPatient($patient) {
        try {

            $sql = "insert into Patient(name, surname, dni, nhc, birthdate) values (?, ?, ?, ?, ?)";

            $query = $this->conn->prepare($sql);

            $name = $patient->getName();
            $surname = $patient->getSurname();
            $dni = $patient->getDni();
            $nhc = $patient->getNhc();
            $birthdate = $patient->getBirthday();

            return ($query->execute([$name, $surname, $dni, $nhc, $birthdate])) ? 1 : 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //This function deletes a patient from the database.

    public function deletePatient(string $dni) {

        try {
            $sql = "delete from Patient where dni=?";

            $query = $this->conn->prepare($sql);

            return ($query->execute([$dni])) ? 1 : 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //This function updates a patient from the database.

    public function updatePatient(Patient $patient) {

        try {
            $sql = "update Patient set name=?, surname=?, nhc=?, birthdate=? where id_patient=?";

            $query = $this->conn->prepare($sql);

            $name = $patient->getName();
            $surname = $patient->getSurname();
            $dni = $patient->getDni();
            $nhc = $patient->getNhc();
            $birthdate = $patient->getBirthday();

            return ($query->execute([$name, $surname, $nhc, $birthdate, $dni])) ? 1 : 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //This function get's the patient that corresponds with the dni value.

    public function getPatient(int $id) {

        try {
            $sql = "select id_patient, name, surname, dni, nhc, birthdate from Patient where id_patient=?";

            $query = $this->conn->prepare($sql);

            $query->execute([$id]);

            $tablePatient = $query->fetch();
            $myPatient = new Patient(
                $tablePatient["name"],
                $tablePatient["surname"],
                $tablePatient["dni"],
                $tablePatient["nhc"],
                $tablePatient["birthdate"]
            );

            return $myPatient;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //This function shows all the patients in the database.

    public function getAllPatients() {

        try {
            $sql = "select id_patient, name, surname, dni, nhc, birthdate from Patient";

            $query = $this->conn->prepare($sql);

            $query->execute();

            $patientList = array();

            while($myPatient = $query->fetch()) {
                $myPatient = new Patient(
                    $myPatient["name"],
                    $myPatient["surname"],
                    $myPatient["dni"],
                    $myPatient["nhc"],
                    $myPatient["birthdate"]
                );

                $patientList[] = $myPatient;
            }

            return $patientList;
        } catch (PDOException $e) {
            throw $e;
        }

        
    }
    public function existsPatient($id) {
        try {
            $sql = "SELECT COUNT(*) FROM Patient WHERE id_patient = ?";
            $query = $this->conn->prepare($sql);
            $query->execute([$id]);

            $count = $query->fetchColumn();

            return $count > 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}