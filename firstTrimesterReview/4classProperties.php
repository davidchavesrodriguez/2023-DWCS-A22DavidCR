<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propieclases</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
        text-align: center;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .result {
        margin-top: 20px;
        font-weight: bold;
        color: #333;
    }

    .result-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    </style>
</head>

<!-- Create a class with two properties (private access):

- constante, int. The value of this property is the same for all objects of the class that are created.

- numero, int. The value of this property is different for every object of the class.

Create the following methods:

- A method called multiplyConstante, that receives a number, multiplies it by the constante attribute and returns the result.

- A method called multiplyNumero, that receives a number, multiplies it by the numero attribute and returns the result.

- Add other required methods.

Write the php code that invokes the previous methods and shows the results.-->

<body>
    <?php
    class classProperties
    {
        private static $constante = 19;

        public function __construct(private int $numero)
        {
        }

        public static function multiplyConstante($number): int
        {
            $result = $number * self::$constante;
            return $result;
        }
        public function multiplyNumero($number): int
        {
            $result = $number * $this->numero;
            return $result;
        }
    };
    $obj = new classProperties(5);
    ?>

    <div class="result-container">
        <div class="result">Multiply Constante: <?php echo $obj->multiplyConstante(7); ?></div>
        <div class="result">Multiply Numero: <?php echo $obj->multiplyNumero(7); ?></div>
    </div>
    </div>
</body>

</html>