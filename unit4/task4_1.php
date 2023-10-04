<!-- Write a PHP calculator class with two attributes that will only be accessible from that class: num1 and num2.

The class must have the following functions:

- A constructor, getters and setters.

- Function multiply, that multiplies both attributes and returns the result.

- Function add, that adds both attributes and returns the result.

- Function toString, that returns a String with the values of the attributes.

Write a program that:

- It creates the object firstCalcule empty. Then it assigns values the attributes using the setters. Finally it shows the values of the attributes using the getters. 

- It creates the object secondCalcule assigning the values to the attributes at the moment of creation. Use the function toString to show the values of the attributes.  Shows the values returned by the multiply and add functions. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Class
    class Calculator
    {
        private $num1;
        private $num2;

        function __construct($num1 = 0, $num2 = 0)
        {
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
        /**
         * Get the value of num1
         */
        public function getNum1()
        {
            return $this->num1;
        }

        /**
         * Set the value of num1
         *
         * @return  self
         */
        public function setNum1($num1)
        {
            $this->num1 = $num1;

            return $this;
        }

        /**
         * Get the value of num2
         */
        public function getNum2()
        {
            return $this->num2;
        }

        /**
         * Set the value of num2
         *
         * @return  self
         */
        public function setNum2($num2)
        {
            $this->num2 = $num2;

            return $this;
        }

        public function multiply()
        {
            return $this->num1 * $this->num2;
        }

        public function add()
        {
            return $this->num1 + $this->num2;
        }

        public function __toString()
        {
            return "<br><br>Number1: $this->num1 Number2: $this->num2";
        }
    }
    $firstCalcule = new Calculator();
    $firstCalcule->setNum1(10);
    $firstCalcule->setNum2(20);
    echo "Values of the properties: ", $firstCalcule->getNum1(), " ", $firstCalcule->getNum2();
    echo "<br>";

    /* - It creates the object secondCalcule assigning the values to the attributes at the moment of creation. Use the function toString to show the values of the attributes.  Shows the values returned by the multiply and add functions. */

    $secondCalcule = new Calculator(30, 50);
    echo $secondCalcule;
    echo "<br>";
    echo "Multiply: ", $secondCalcule->multiply();
    echo "<br>";
    echo "Add: ", $secondCalcule->add();
    ?>
</body>

</html>