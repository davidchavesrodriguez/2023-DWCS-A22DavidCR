<?php

// Trait CalculosCentroEstudos
trait CalculosCentroEstudo
{
    public function numeroDeAprobados($notas)
    {
        $aprobados = 0;
        foreach ($notas as $nota) {
            if ($nota >= 5) {
                $aprobados++;
            }
        }
        return $aprobados;
    }

    public function numeroDeSuspensos($notas)
    {
        $suspensos = 0;
        foreach ($notas as $nota) {
            if ($nota < 5) {
                $suspensos++;
            }
        }
        return $suspensos;
    }

    public function notaMedia($notas)
    {
        if (count($notas) == 0) {
            return 0;
        }

        $sumaNotas = array_sum($notas);
        return $sumaNotas / count($notas);
    }
}

// Trait MostraCalculos
trait MostraCalculos
{
    public function saudo()
    {
        echo "Benvido ao centro de cálculos<br>";
    }

    public function mostraCalculosCentroEstudos($aprobados, $suspensos, $notaMedia)
    {
        echo "Número de aprobados: $aprobados<br>";
        echo "Número de suspensos: $suspensos<br>";
        echo "Nota media: $notaMedia<br>";
    }
}

// Clase NotasTrait que usa los dos traits anteriores
class NotasTrait
{
    use CalculosCentroEstudo, MostraCalculos;

    private $notas = [];

    public function __construct($notas)
    {
        $this->notas = $notas;
    }

    public function testear()
    {
        $aprobados = $this->numeroDeAprobados($this->notas);
        $suspensos = $this->numeroDeSuspensos($this->notas);
        $notaMedia = $this->notaMedia($this->notas);

        $this->saudo();
        $this->mostraCalculosCentroEstudos($aprobados, $suspensos, $notaMedia);
    }
}

// Crear un objeto de la clase NotasTrait con un array de notas
$notasTrait = new NotasTrait([8, 5, 2, 3, 4, 5, 2, 1, 3, 4, 10]);

// Testear la clase usando el método testear()
$notasTrait->testear();
