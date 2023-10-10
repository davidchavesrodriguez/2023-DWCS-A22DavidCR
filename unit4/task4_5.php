<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Clase Notas con un atributo privado que es un array de notas
    abstract class Notas
    {
        protected $notas = [];

        // Constructor para inicializar las notas
        public function __construct($notas)
        {
            $this->notas = $notas;
        }
    }

    // Interfaz CalculosCentroEstudos
    interface CalculosCentroEstudos
    {
        public function numeroDeAprobados();
        public function numeroDeSuspensos();
        public function notaMedia();
    }

    // Clase NotasDaw que hereda de Notas e implementa CalculosCentroEstudos
    class NotasDaw extends Notas implements CalculosCentroEstudos
    {
        public function numeroDeAprobados()
        {
            $aprobados = 0;
            foreach ($this->notas as $nota) {
                if ($nota >= 5) {
                    $aprobados++;
                }
            }
            return $aprobados;
        }

        public function numeroDeSuspensos()
        {
            $suspensos = 0;
            foreach ($this->notas as $nota) {
                if ($nota < 5) {
                    $suspensos++;
                }
            }
            return $suspensos;
        }

        public function notaMedia()
        {
            if (count($this->notas) == 0) {
                return 0;
            }

            $sumaNotas = array_sum($this->notas);
            return $sumaNotas / count($this->notas);
        }

        // Implementación de la función __toString()
        public function __toString()
        {
            return "Número de aprobados: " . $this->numeroDeAprobados() . "<br>" .
                "Número de suspensos: " . $this->numeroDeSuspensos() . "<br>" .
                "Nota media: " . $this->notaMedia();
        }
    }

    // Crear un objeto de la clase NotasDaw con un array de notas
    $notasDaw = new NotasDaw([8, 5, 2, 3, 4, 5, 2, 1, 3, 4, 10]);

    // Mostrar los resultados usando el método __toString()
    echo $notasDaw;

    ?>


</body>

</html>