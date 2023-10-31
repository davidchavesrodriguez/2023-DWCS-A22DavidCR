<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        .svg-icon {
            width: 2em;
            height: 2em;
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

        form {
            margin: auto;
            text-align: center;
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
    // echo "Eliminado!";

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
            <button type='submit' name='allStudents'>
            <svg class='svg-icon' viewBox='0 0 20 20'>
               <path d='M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z'></path>
            </svg>
            All Students
         </button>
         <button type='submit' name='addStudent'>
            <svg class='svg-icon' viewBox='0 0 20 20'>
               <path d='M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z'></path>
            </svg>
            Add Student
         </button>
         <button type='submit' name='deleteStudent'>
            <svg class='svg-icon' viewBox='0 0 20 20'>
               <path d='M17.114,3.923h-4.589V2.427c0-0.252-0.207-0.459-0.46-0.459H7.935c-0.252,0-0.459,0.207-0.459,0.459v1.496h-4.59c-0.252,0-0.459,0.205-0.459,0.459c0,0.252,0.207,0.459,0.459,0.459h1.51v12.732c0,0.252,0.207,0.459,0.459,0.459h10.29c0.254,0,0.459-0.207,0.459-0.459V4.841h1.511c0.252,0,0.459-0.207,0.459-0.459C17.573,4.127,17.366,3.923,17.114,3.923M8.394,2.886h3.214v0.918H8.394V2.886z M14.686,17.114H5.314V4.841h9.372V17.114z M12.525,7.306v7.344c0,0.252-0.207,0.459-0.46,0.459s-0.458-0.207-0.458-0.459V7.306c0-0.254,0.205-0.459,0.458-0.459S12.525,7.051,12.525,7.306M8.394,7.306v7.344c0,0.252-0.207,0.459-0.459,0.459s-0.459-0.207-0.459-0.459V7.306c0-0.254,0.207-0.459,0.459-0.459S8.394,7.051,8.394,7.306'></path>
            </svg>
            Delete Student
         </button>
         <button type='submit' name='getStudent'>
            <svg class='svg-icon' viewBox='0 0 20 20'>
               <path d='M8.749,9.934c0,0.247-0.202,0.449-0.449,0.449H4.257c-0.247,0-0.449-0.202-0.449-0.449S4.01,9.484,4.257,9.484H8.3C8.547,9.484,8.749,9.687,8.749,9.934 M7.402,12.627H4.257c-0.247,0-0.449,0.202-0.449,0.449s0.202,0.449,0.449,0.449h3.145c0.247,0,0.449-0.202,0.449-0.449S7.648,12.627,7.402,12.627 M8.3,6.339H4.257c-0.247,0-0.449,0.202-0.449,0.449c0,0.247,0.202,0.449,0.449,0.449H8.3c0.247,0,0.449-0.202,0.449-0.449C8.749,6.541,8.547,6.339,8.3,6.339 M18.631,4.543v10.78c0,0.248-0.202,0.45-0.449,0.45H2.011c-0.247,0-0.449-0.202-0.449-0.45V4.543c0-0.247,0.202-0.449,0.449-0.449h16.17C18.429,4.094,18.631,4.296,18.631,4.543 M17.732,4.993H2.46v9.882h15.272V4.993z M16.371,13.078c0,0.247-0.202,0.449-0.449,0.449H9.646c-0.247,0-0.449-0.202-0.449-0.449c0-1.479,0.883-2.747,2.162-3.299c-0.434-0.418-0.714-1.008-0.714-1.642c0-1.197,0.997-2.246,2.133-2.246s2.134,1.049,2.134,2.246c0,0.634-0.28,1.224-0.714,1.642C15.475,10.331,16.371,11.6,16.371,13.078M11.542,8.137c0,0.622,0.539,1.348,1.235,1.348s1.235-0.726,1.235-1.348c0-0.622-0.539-1.348-1.235-1.348S11.542,7.515,11.542,8.137 M15.435,12.629c-0.214-1.273-1.323-2.246-2.657-2.246s-2.431,0.973-2.644,2.246H15.435z'></path>
            </svg>
            Get Student
         </button>
         <button type='submit' name='updateStudent'>
            <svg class='svg-icon' viewBox='0 0 20 20'>
               <path d='M12.319,5.792L8.836,2.328C8.589,2.08,8.269,2.295,8.269,2.573v1.534C8.115,4.091,7.937,4.084,7.783,4.084c-2.592,0-4.7,2.097-4.7,4.676c0,1.749,0.968,3.337,2.528,4.146c0.352,0.194,0.651-0.257,0.424-0.529c-0.415-0.492-0.643-1.118-0.643-1.762c0-1.514,1.261-2.747,2.787-2.747c0.029,0,0.06,0,0.09,0.002v1.632c0,0.335,0.378,0.435,0.568,0.245l3.483-3.464C12.455,6.147,12.455,5.928,12.319,5.792 M8.938,8.67V7.554c0-0.411-0.528-0.377-0.781-0.377c-1.906,0-3.457,1.542-3.457,3.438c0,0.271,0.033,0.542,0.097,0.805C4.149,10.7,3.775,9.762,3.775,8.76c0-2.197,1.798-3.985,4.008-3.985c0.251,0,0.501,0.023,0.744,0.069c0.212,0.039,0.412-0.124,0.412-0.34v-1.1l2.646,2.633L8.938,8.67z M14.389,7.107c-0.34-0.18-0.662,0.244-0.424,0.529c0.416,0.493,0.644,1.118,0.644,1.762c0,1.515-1.272,2.747-2.798,2.747c-0.029,0-0.061,0-0.089-0.002v-1.631c0-0.354-0.382-0.419-0.558-0.246l-3.482,3.465c-0.136,0.136-0.136,0.355,0,0.49l3.482,3.465c0.189,0.186,0.568,0.096,0.568-0.245v-1.533c0.153,0.016,0.331,0.022,0.484,0.022c2.592,0,4.7-2.098,4.7-4.677C16.917,9.506,15.948,7.917,14.389,7.107 M12.217,15.238c-0.251,0-0.501-0.022-0.743-0.069c-0.212-0.039-0.411,0.125-0.411,0.341v1.101l-2.646-2.634l2.646-2.633v1.116c0,0.174,0.126,0.318,0.295,0.343c0.158,0.024,0.318,0.034,0.486,0.034c1.905,0,3.456-1.542,3.456-3.438c0-0.271-0.032-0.541-0.097-0.804c0.648,0.719,1.022,1.659,1.022,2.66C16.226,13.451,14.428,15.238,12.217,15.238'></path>
            </svg>
            Update Student
         </button>
         </form>
         
          ";
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addStudent"])) {
                echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>";
                echo "<br><label for='idName'>Name: </label>";
                echo "<input type='text' id='idName' name='name'></input><br>";
                echo "<label for='idSurname'>Surname: </label>";
                echo "<input type='text' id='idSurname' name='surname'></input><br>";
                echo "<label for='idDni'>DNI: </label>";
                echo "<input type='text' id='idDni' name='dni'></input><br>";
                echo "<label for='idAge'>Age: </label>";
                echo "<input type='text' id='idAge' name='age'></input><br>";
                echo "<input type='submit' name='addStudentSubmit' value='Add Student'>";
                echo "</form>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteStudent"])) {
                echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>";
                echo "<br><label for='idDni'>Student's DNI you want to delete: </label>";
                echo "<input type='text' id='idDni' name='dni'></input><br>";
                echo "<input type='submit' name='deleteStudentSubmit' value='Delete Student'>";
                echo "</form>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getStudent"])) {
                echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>";
                echo "<br><label for='idDni'>Student's DNI you want to see: </label>";
                echo "<input type='text' id='idDni' name='dni' required></input><br>";
                echo "<input type='submit' name='getStudentSubmit' value='See Student'>";
                echo "</form>";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateStudent"])) {
                echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'>";
                echo "<br><label for='idDni'>Student's DNI you want to update: </label>";
                echo "<input type='text' id='idDni' name='dni'></input><br><br>";
                echo "<p><b>Updated data: </b></p>";
                echo "<label for='idName'>Name: </label>";
                echo "<input type='text' id='idName' name='name'></input><br>";
                echo "<label for='idSurname'>Surname: </label>";
                echo "<input type='text' id='idSurname' name='surname'></input><br>";
                echo "<label for='idAge'>Age: </label>";
                echo "<input type='text' id='idAge' name='age'></input><br>";
                echo "<input type='submit' name='updateStudentSubmit' value='Update Student'>";
                echo "</form>";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addStudentSubmit"])) {
                $dni = $_POST["dni"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $age = $_POST["age"];
                $oper->addStudent(new Student($dni, $name, $surname, $age));
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteStudentSubmit"])) {
                $dni = $_POST["dni"];
                $oper->deleteStudent($dni);
                echo "<b>Deleted student with dni ". $dni. "</b>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["getStudentSubmit"])) {
                $dni = $_POST["dni"];
                $myStudent = $oper->getStudent($dni);
            
                if ($myStudent === null) {
                    echo "Student not found.";
                } else {
                    echo $myStudent;
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateStudentSubmit"])) {
                $dni = $_POST["dni"];
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $age = $_POST["age"];
                $oper->modifyStudent(new Student($dni, $name, $surname, $age));
                echo "<b>Modified student with dni ". $dni. "</b>";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["allStudents"])) {
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
            echo "</table>"; }
        } else {
            echo "No students found.";
        }
    }

    ?>
</body>

</html>