<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves Rodriguez, David</title>
</head>
<!-- Create the classes described below. By default the properties are private and the methods are public. Use exceptions to control the errors and inform about them.
    Class Person with:
        Properties: name, age, id
        Methods: Constructor
    Interface Information with the method "printProperties", that shows on the screen all the properties of the object.
    The class Vehicle uses the interface Information and has the following properties and methods:
        Properties: brand, model and owner (type Person).
        Methods: Constructor.
    Class Maths with a method division, that receives two natural numbers and shows on the screen the result of the integer division and the remainder of the integer division. We will be able to execute this method without creating an object of the class. Create an exception if any of the arguments is decimal.
    In the php page perform the following tasks:
        Create an object of Vehicle, invoke the methods and show the results.
        Execute the method division in the class Maths using the following values: 8/2, 8/0, 3.4/7.8
        Show on the screen the results and the error messages. -->

<body>
    <?php
    class Person
    {
        private $name;
        private $age;
        private $id;

        public function __construct($name, $age, $id)
        {
            $this->name = $name;
            $this->age = $age;
            $this->id = $id;
        }
        public function getName()
        {
            return $this->name;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function getId()
        {
            return $this->id;
        }
    }

    interface Information
    {
        public function printProperties();
    }

    class Vehicle implements Information
    {
        private $brand;
        private $model;
        private $owner;

        public function __construct($brand, $model, Person $owner)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->owner = $owner;
        }

        public function printProperties()
        {
            echo "<h1>Project Unit 4</h1>";

            echo "<h3>Vehicle Details: </h3>";
            echo "Brand: ", $this->brand;
            echo "</br>";
            echo "Model: ", $this->model;
            echo "<br>";

            echo "<h3>Owner Details: </h3>";
            echo "Owner´s name: ", $this->owner->getName();
            echo "<br>";
            echo "Owner´s age: ", $this->owner->getAge();
            echo "<br>";
            echo "Owner´s ID: ", $this->owner->getId();
        }
    }

    class Maths
    {
        public static function division($dividend, $divisor)
        {
            if (!is_int($dividend) || !is_int($divisor) || $dividend != (int) $dividend || $divisor != (int) $divisor) {
                throw new Exception("Both numbers must be integers!!");
            } elseif ($divisor == 0) {
                throw new Exception("You cannot divide by zero!");
            }
            echo "That division gets you: <b>", $dividend / $divisor, "</b>";
            echo " and you still got <b>", $dividend % $divisor, "</b> as remainder.";
        }
    }

    $ownerSantiago = new Person("Julian", 22, 1);
    $vehicleSantiago = new Vehicle("Ford", "Fiesta", $ownerSantiago);
    $vehicleSantiago->printProperties();
    echo "<br>";
    echo "<h3> Maths: </h3>";
    try {
        Maths::division(8, 2);
        echo "<br>";
    } catch (Exception $exception) {
        echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
    }
    try {
        Maths::division(8, 0);
        echo "<br>";
    } catch (Exception $exception) {
        echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
        echo "<br>";
    }
    try {
        Maths::division(3.4, 7.8);
    } catch (Exception $exception) {
        echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
        echo "<br>";
    }

    ?>
</body>

</html>