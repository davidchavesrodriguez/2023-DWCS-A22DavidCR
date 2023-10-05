<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle</title>
</head>

<body>
    <h1>Vehicle</h1>

    <?php

    class Vehicle
    {
        protected $color;
        protected $wheels;
        protected $cv;
        protected $power;

        public function __construct($color = "White", $wheels = 2, $cv = 1500, $power = 4000)
        {
            $this->color = $color;
            $this->wheels = $wheels;
            $this->cv = $cv;
            $this->power = $power;
        }

        public function getColor()
        {
            return $this->color;
        }

        public function getWheels()
        {
            return $this->wheels;
        }

        public function getCv()
        {
            return $this->cv;
        }

        public function getPower()
        {
            return $this->power;
        }

        public function setColor($color)
        {
            $this->color = $color;
        }

        public function setCv($cv)
        {
            $this->cv = $cv;
        }

        public function setPower($power)
        {
            $this->power = $power;
        }
    }

    class Truck extends Vehicle
    {
        private $axles;

        public function __construct($color = "White", $wheels = 2, $cv = 1500, $power = 4000, $axles = 2)
        {
            $this->color = $color;
            $this->wheels = $wheels;
            $this->cv = $cv;
            $this->power = $power;
            $this->axles = $axles;
        }

        public function getAxles()
        {
            return $this->axles;
        }

        public function setAxles($axles)
        {
            $this->axles = $axles;
        }

        public function __toString()
        {
            return "The truck is " . $this->color . " and have " . strval($this->wheels) . " wheels. 
                They have " . strval($this->cv) . "CV and a power of " . strval($this->power) . "J/S.
                Axles: " . strval($this->axles);
        }
    }

    class Motorcycle extends Vehicle
    {
        private $places;

        public function __construct($color = "White", $wheels = 2, $cv, $power, $places = 2)
        {
            $this->color = $color;
            $this->wheels = $wheels;
            $this->cv = $cv;
            $this->power = $power;
            $this->places = $places;
        }

        public function getPlaces()
        {
            return $this->places;
        }

        public function setPlaces($places)
        {
            $this->places = $places;
        }

        public function __toString()
        {
            return "The motorcycle is " . $this->color . " and have " . strval($this->wheels) . " wheels. 
                They have " . strval($this->cv) . "CV and a power of " . strval($this->power) . "J/S. Places: 
                " . strval($this->places) . " people.";
        }
    }

    $motorcycle1 = new Motorcycle("Red", 2, 125, 25);

    $motorcycle2 = new Motorcycle("Green", 2, 125, 25, 2);

    $truck1 = new Truck("Blue", 4, 4000, 300, 2);

    $truck2 = new Truck("Yellow", 24, 15000, 1000, 6);

    $motorcycle1->setPlaces(1);

    echo $motorcycle2->getCv() . "<br>";

    $truck2->setPower(800);

    echo $motorcycle1 . "<br>";
    echo $motorcycle2 . "<br>";
    echo $truck1 . "<br>";
    echo $truck2 . "<br>";

    ?>
</body>

</html>