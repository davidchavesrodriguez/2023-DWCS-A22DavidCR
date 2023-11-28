<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaces</title>
</head>

<!-- Create an interface with a method called mostrar, 
that receives a String and prints it on the screen.

Create a class that uses the previous interface.

Can a class inherit from several interfaces?
Yes, they can -->

<body>
    <?php
    interface interfaceExercicio5
    {
        public function mostrar(string $string);
    }

    class claseExercicio5 implements interfaceExercicio5
    {
        public function mostrar(string $string)
        {
            echo $string;
        }
    }
    $obj = new claseExercicio5;
    $obj->mostrar("Bos días");
    ?>

</body>

</html>