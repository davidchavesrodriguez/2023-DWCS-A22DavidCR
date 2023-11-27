<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .result {
            font-size: 1.2em;
            color: #008000;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<!-- Create an object using an anonymous class that has the following structure:

- Property number with value=5

- Function factorial that calculates the factorial of that number and returns the result.

Write the php code that executes the previous function. -->

<body>
    <?php
    $anon = new class
    {
        private $number = 5;
        public function factorial()
        {
            $result = 1;
            while ($this->number > 1) {
                $result *= $this->number;
                $this->number--;
            }
            return $result;
        }
    };
    ?>
    <h1>Anon</h1>
    <?php
    echo "The result is {$anon->factorial()}";
    ?>
</body>

</html>