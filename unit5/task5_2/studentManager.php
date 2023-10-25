<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php     $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];?>
<body height=100% style="background-color: <?php echo $color; ?>;">

    <?php
    require_once("OperationsDb.php");
    error_reporting(E_ALL);
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

    //ADD STUDENT
    // try {
    //     $oper = new OperationsDb();

    //     $student = new Student("12345678Z", "Isamel", "Fit", 33);
    //     $numberOfAddedRows = $oper->addStudent($student);
    //     if ($numberOfAddedRows == 1) {
    //         echo "Usuario añadido!";
    //     } else {
    //         echo "Non funcionou :(";
    //     }
    // } catch (Exception $e) {
    //     echo "" . $e->getMessage() . "";
    // }

    //GET STUDENT
    // $oper=new OperationsDb();
    // echo $oper->getStudent("11111111A");

    //DELETE STUDENT
    // $oper=new OperationsDb();
    // $oper->deleteStudent("12345678Z");
    // echo "Eliminado!"

    // MODIFY STUDENT
    // $oper=new OperationsDb();
    // $updatedStudent= new Student("12345678Z", "Diego", "Rianxo", 14);
    // $oper->modifyStudent($updatedStudent);
    // echo "Student modified";

    // STUDENT LIST
    $oper = new OperationsDb();
    $studentList = $oper->studentsList();
    
    if (isset($studentList['error'])) {
        echo "Error: " . $studentList['error'];
    } else {
        if (count($studentList) > 0) {
            echo "<h1>Student List</h1>";
    
            foreach ($studentList as $student) {
                echo "<h3 style='color:$color;'>Student: </h3>";
                echo "<b>DNI:</b> " . $student['dni'] . "<br>";
                echo "<b>Name:</b> " . $student['name'] . "<br>";
                echo "<b>Surname:</b> " . $student['surname'] . "<br>";
                echo "<b>Age:</b> " . $student['age'] . "<br><br>";
            }
    
        } else {
            echo "No students found.";
        }
    }
    
    
    ?>
</body>

</html>