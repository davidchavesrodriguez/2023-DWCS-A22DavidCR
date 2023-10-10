<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- 

Create a class Alien with an attribute called name and a constructor.

Add an attribute numberOfAliens so that we can know the number of objects of this class have been created.

Create a method getNumberOfAliens that returns that information.

Write the code that creates several objects of Alien and shows the value returned by the numberOfAliens method.
 -->

<body>
    <?php
    class Alien
    {
        private $name;
        private static $numberOfAliens = 0;

        public function __construct($name)
        {
            $this->name = $name;
            self::$numberOfAliens++;
        }
        public static function getNumberOfAliens()
        {
            return self::$numberOfAliens;
        }
    }

    $alien1 = new Alien("Julier");
    $alien2 = new Alien("Rianxek");
    $alien3 = new Alien("Isamel");

    echo Alien::getNumberOfAliens();

    ?>
</body>

</html>