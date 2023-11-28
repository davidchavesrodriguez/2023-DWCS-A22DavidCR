<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratitos</title>
</head>
<!-- Create a trait with a method called mostrar, that receives a String and prints it on the screen.

Create a class that uses the previous trait.

Can a class inherit from several traits?-->

<body>
    <?php
    trait traitExercise7
    {
        public function mostrar(string $string)
        {
            echo $string;
        }
    }

    class claseExercicio7
    {
        use traitExercise7;
    }
    $obj = new claseExercicio7;
    $obj->mostrar("Boas noites");
    ?>
</body>

</html>