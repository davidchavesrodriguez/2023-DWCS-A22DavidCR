<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- 
Crea un Trait de nome CalculosCentroEstudos coas mesmas funcións cá interface do exercicio 4.5 pero coa diferencia de que estas funcións reciben como parámetro un array de números coas notas.

Crea outro trait de nome MostraCalculos con dúas funcións: a función saúdo que mostra por pantalla "Benvido ao centro de cálculos" e a función mostraCalculosCentroEstudos, que recibe o número de aprobados, de suspensos e a nota media e os mostra por pantalla dándolles formato.

Crea unha clase de nome NotasTrait que usa os dous traits anteriores.

Escribe o código correspondente para "testear" a anterior clase.
 -->

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        trait CalculosCentroEstudos
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

        trait MostraCalculos
        {
            public function saudo()
            {
                echo "Benvido ao centro de cálculos";
                echo "</br>";
            }

            public function mostraCalculosCentroEstudos($aprobados, $suspensos, $notaMedia)
            {
                echo "Número de aprobados: " . $aprobados;
                echo "</br>";
                echo "Número de suspensos: " . $suspensos;
                echo "</br>";
                echo "Nota media: " . number_format($notaMedia, 2);
            }
        }

        class NotasTrait
        {
            use CalculosCentroEstudos, MostraCalculos;
        }

        $notas = [2, 4, 5, 2, 1, 6, 7, 3, 4, 2];
        $notasTrait = new NotasTrait();

        $aprobados = $notasTrait->numeroDeAprobados($notas);
        $suspensos = $notasTrait->numeroDeSuspensos($notas);
        $notaMedia = $notasTrait->notaMedia($notas);

        $notasTrait->saudo();
        $notasTrait->mostraCalculosCentroEstudos($aprobados, $suspensos, $notaMedia);


        ?>
    </body>

    </html>

</body>

</html>