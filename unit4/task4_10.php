<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExPropia</title>
</head>
<!--  Define a new exception class called ExPropia.

Create a class called ExPropiaClass, with a static method testNumber that receives a number. If the number is zero it throws an exception ExPropia. The exception is not catched within this class.

In the php code of the page execute the method testNumber with different values, catching the possible exceptions. -->

<body>
    <?php
    class ExPropia extends Exception
    {
        function __construct($msg)
        {
            parent::__construct($msg);
        }
    }
    class ExPropiaClass
    {
        public static function testNumber($num)
        {
            if ($num == 0) {
                throw new ExPropia('Number cant be 0');
            } else {
                echo 'Valid number';
            }
        }
    }
    try {
        ExPropiaClass::testNumber(19);
        echo "</br>";
        ExPropiaClass::testNumber(0);
    } catch (ExPropia $erro) {
        echo $erro->getMessage();
    }

    ?>
</body>

</html>