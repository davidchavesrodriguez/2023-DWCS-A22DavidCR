<?php 
class Menu{
    private $type;
    private $arrayOpcion = [];

    public function __construct($type){
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    public function insertar(Opcion $opcion){
        $this->arrayOpcion[] = $opcion;
    }

    public function mostrarMenu(){
        foreach ($this->arrayOpcion as $opcion) {
            echo "<a href='", $opcion->getEnlace() , "'><h3 style=background-color:", $opcion->getColorFondo(), ">", $opcion->getTitulo(),  "</h3></a>";
        }
    }
}

class Opcion{
    private $titulo;
    private $enlace;
    private $colorFondo;

    public function __construct($titulo, $enlace, $colorFondo){
        $this->titulo= $titulo;
        $this->enlace= $enlace;
        $this->colorFondo= $colorFondo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getEnlace() {
        return $this->enlace;
    }

    public function getColorFondo() {
        return $this->colorFondo;
    }

    public function __toString()  {
        return self::class . ": " . $this->titulo . " " . $this->enlace . " " . $this->colorFondo;
    }   
}
?>
