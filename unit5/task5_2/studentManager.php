<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        .svg-icon {
            width: 1em;
            height: 1em;
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
            fill: #4691f6;
        }

        .svg-icon circle {
            stroke: #4691f6;
            stroke-width: 1;
        }

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
            margin-top: 50px;
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

        .hover:hover {
            font-size: 1.7em;
            background-color: #F4DDFF;
        }

        #buttonDiv {

            margin-top: 50px;
        }
        form{
            margin: auto;
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
            echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>
            <div id='buttonDiv'>
              <button type='submit' name='submit'>
                <svg class='svg-icon' viewBox='0 0 20 20'>
                  <path d='M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z'></path>
                </svg>
                Add Student
              </button>
            </div>
          </form>
          ";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>";
                echo "<label for='idName'>Name: </label>";
                echo "<input type='text' id='idName' name='name'></input><br>";
                echo "<label for='idSurname'>Surname: </label>";
                echo "<input type='text' id='idSurname' name='surname'></input><br>";
                echo "<label for='idDni'>DNI: </label>";
                echo "<input type='text' id='idDni' name='dni'></input><br>";
                echo "<label for='idAge'>Age: </label>";
                echo "<input type='text' id='idAge' name='age'></input>";
                echo "<input type='submit'>";
                echo "</form>";
            }
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

                echo "<tr class='hover'>";
                echo "<td>";
                echo "<b style='text-decoration: underline; text-decoration-color: $color; text-decoration-thickness: 3px;'>" . $student['name'] . "</b>";
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