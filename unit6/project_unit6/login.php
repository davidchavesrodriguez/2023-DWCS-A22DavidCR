<?php
session_start();
include_once("./classes/users.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleProject.css">
    <title>Log In</title>
</head>

<body>
    <?php
    $conectionMethod = new User();
    echo "<form action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . " method='POST' enctype='multipart/form-data'><br>";
    echo "<h2 style='color: red;'>*You need to log in in order to make changes*</h2>";
    echo "<label for='adminLoginAdd'> Username </label>";
    echo "<input type='text' id='adminLoginAdd' name='adminLoginAdd'><br>";
    echo "<label for='adminPasswordAdd'> Password </label>";
    echo "<input type='password' id='adminPasswordAdd' name='adminPasswordAdd'><br>";
    echo "<input type='submit' name='submitLoginUser' value=' Log In' />";

    echo "<a href='GaelicManager.php'>Go Back</a>";
    echo "</form>";

    if (isset($_POST["submitLoginUser"])) {
        $_SESSION["username"] = ($_POST["adminLoginAdd"]);
        $_SESSION["password"] = ($_POST["adminPasswordAdd"]);
        if ($conectionMethod->checkUsers($_SESSION["username"], $_SESSION["password"]) === true) {
            header("Location: GaelicManager.php");
        } else {
            header("Location: login.php");
            echo "You need to be an admin to make changes";
        }
    }
    ?>
</body>

</html>