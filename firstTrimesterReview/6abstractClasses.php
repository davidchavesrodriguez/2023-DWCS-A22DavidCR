<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstract</title>
</head>
<!-- 
Create an abstract class with a method called mostrar, that receives a String and prints it on the screen.

Create a class that uses the previous class.

Can a class inherit from several classes?
No, they can't

What is the difference between using interfaces and abstract classes?

    Interfaces cannot have properties, while abstract classes can
    All interface methods must be public, while abstract class methods is public or protected
    All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
    Classes can implement an interface while inheriting from another class at the same time

-->

<body>

    <?php
    abstract class abstractClass
    {
        public abstract function mostrar(string $string);
    }

    class classExercise6 extends abstractClass
    {
        public function mostrar(string $string)
        {
            echo $string;
        }
    }

    $obj = new classExercise6;
    $obj->mostrar("Boas tardes");

    ?>

</body>

</html>