<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous</title>
</head>
<!-- 

Crear un objeto utilizando una clase anónima, con los siguientes requerimientos:

    Esta clase tiene 2 propiedades $x y $y. Asígnale valores a estas propiedades al declararlas.
    Esta clase tiene 2 métodos llamados multiplicar y exponencial.
        multiplicar devuelve $x* $y
        exponencial devuelve $x elevado a $y
    Escribir un ejemplo de uso.

 -->

<body>

    <?php
    $testClass = new class()
    {
        private $x = 19;
        private $y = 11;

        public function multiply()
        {
            return $this->x * $this->y;
        }

        public function power()
        {
            return $this->x ** $this->y;
        }
    };
    echo "<h1>This is a test for anonymous classes</h1>";
    echo "</br>";
    echo $testClass->multiply();
    echo "</br>";
    echo $testClass->power();

    ?>

</body>

</html>