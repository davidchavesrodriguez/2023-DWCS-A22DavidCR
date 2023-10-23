<?php 
error_reporting(E_ALL);

require_once("OperationsDb.php");
try{
    $oper= new OperationsDb();
    echo "Isamel hola";

    $student= new Student("12345678Z", "Isamel", "Fit", 33);
    $oper->addStudent($student);
    echo "Isamel pa dentro";

    $numberOfAddedRows= $oper->addStudent($student);
    echo "Isamel pa dentro";

} catch (Exception $e) {
    echo "". $e->getMessage() ."";
}
?>