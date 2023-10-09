<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    class Notas
    {
        protected $notas = array(2, 4, 5, 2, 1, 6, 7, 3, 4, 2);

        public function getNotas()
        {
            return $this->notas;
        }

        public function setNotas($notas)
        {
            $this->notas = $notas;
        }

        public function __toString()
        {
            return implode(', ', $this->notas);
        }
    }

    interface CalculosCentroEstudos
    {
        public function numeroDeAprobados($notas);
        public function numeroDeSuspensos($notas);
        public function notaMedia($notas);
    }

    class NotasDaw extends Notas implements CalculosCentroEstudos
    {
        public function numeroDeAprobados($notas)
        {
            $aprobados = array_filter($notas, function ($nota) {
                return $nota >= 5;
            });
            return count($aprobados);
        }

        public function numeroDeSuspensos($notas)
        {
            $suspensos = array_filter($notas, function ($nota) {
                return $nota < 5;
            });
            return count($suspensos);
        }

        public function notaMedia($notas)
        {
            $totalNotas = array_sum($notas);
            $numNotas = count($notas);
            return $totalNotas / $numNotas;
        }
    }

    $notasDaw = new NotasDaw();
    echo "Notas: " . $notasDaw . "<br>";
    echo "Número de aprobados: " . $notasDaw->numeroDeAprobados($notasDaw->getNotas()) . "<br>";
    echo "Número de suspensos: " . $notasDaw->numeroDeSuspensos($notasDaw->getNotas()) . "<br>";
    echo "Nota media: " . $notasDaw->notaMedia($notasDaw->getNotas()) . "<br>";
    ?>
</body>

</html>