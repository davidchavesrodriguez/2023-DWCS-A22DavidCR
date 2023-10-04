<!-- Write a PHP calculator class with two attributes that will only be accessible from that class: num1 and num2.

The class must have the following functions:

- A constructor, getters and setters.

- Function multiply, that multiplies both attributes and returns the result.

- Function add, that adds both attributes and returns the result.

- Function toString, that returns a String with the values of the attributes.

Write a program that:

- It creates the object firstCalcule empty. Then it assigns values the attributes using the setters. Finally it shows the values of the attributes using the getters. 

- It creates the object secondCalcule assigning the values to the attributes at the moment of creation. Use the function toString to show the values of the attributes.  Shows the values returned by the multiply and add functions. -->
<?php 
    class Calculator {
        private $num1;
        private $num2;
    }
?>