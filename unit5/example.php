<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style='color:blue'>Databases ;)</h1>

    <?php 
require_once("Operations.php"); // Archivo donde se definen las clases

try {
    $oper = new Operations();
    $myGuest = $oper->getMyGuest(11); // Cambiado el argumento de 1 a 2, si deseas obtener el invitado con ID 2, asegúrate de pasarlo correctamente.
    echo "Amado julio";

        echo "ID: " . $myGuest->getId() . "<br>";
        echo "First Name: " . $myGuest->firstName . "<br>";
        echo "Last Name: " . $myGuest->lastname . "<br>";
        echo "Registration Date: " . $myGuest->reg_date . "<br>";

} catch(PDOException $e){
    echo "<span style='color:red' >Error:", $e->getMessage(), "</span>";
    echo "<br>";
} catch(Exception $e){
    echo "<span style='color:red' >Error:", $e->getMessage(), "</span>";
    echo "<br>";
} finally {
    $conn= null; // Cambiado '$conn = null' a '$oper->closeConnection()' para cerrar la conexión correctamente.
}
?>

</body>
</html>