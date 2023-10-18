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
    require_once("Operations.php"); //File where classes are defined
    try {
        $oper= new Operations();
        $guest= new MyGuests("Isamel", "Lens", "A33Isamel@fitness.alo");
        $numberOfRows= $oper->addUser($guest);
        if($numberOfRows ==1) {
            echo "Mira cantas rows :)";
        }else {
            echo "Ta mal";
        }

    }
    catch(PDOException $e){
        echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
            echo "<br>";
    }
    catch(Exception $e){
        echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
            echo "<br>";
    }
    finally{
        $oper->closeConnection();
    }
    ?>
</body>
</html>