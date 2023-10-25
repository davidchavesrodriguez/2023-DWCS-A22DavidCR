<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            background-color: #92ABFF;
        }

        h1 {
            text-align: center;
            background-color: #E9C9F8;
            margin-bottom: 1.5em;
            text-decoration: underline;
        }

        table {
            background-color: #E9C9F8;
            border: solid black 1px;
            border-collapse: collapse;
            width: 80%;
            table-layout: fixed;
            margin: auto;
        }

        th,
        td {
            border: solid black 1px;
            border-collapse: collapse;
            align-items: center;
            text-align: center;
        }

        th {
            font-size: 2em;
        }

        td {
            text-decoration: <?php echo $color ?>;
        }
        tr:hover{
            font-size: 1.7em;
        }
    </style>
</head>


<body>

    <?php
    require_once("OperationsDb.php");
    error_reporting(E_ALL);


    //ADD STUDENT
    //+ try {
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
            echo "<table>";
            echo "<tr>
                <th>
                    Name
                </th>
                <th>
                    Surname
                </th>
                <th>
                    DNI
                </th>
                <th>
                    Age
                </th>
            </tr>";

            foreach ($studentList as $student) {
                $rand = array(
                    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
                    'a', 'b', 'c', 'd', 'e', 'f'
                );
                $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] .
                    $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] .
                    $rand[rand(0, 15)];

                echo "<tr>";
                echo "<td>";
                echo "<b style='text-decoration: underline; text-decoration-color: $color'>" . $student['name'] . "</b>";
                echo "</td>";
                echo "<td>";
                echo $student['surname'];
                echo "</td>";
                echo "<td>";
                echo $student['dni'];
                echo "</td>";
                echo "<td>";
                echo $student['age'];
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No students found.";
        }
    }


    ?>
</body>

</html>