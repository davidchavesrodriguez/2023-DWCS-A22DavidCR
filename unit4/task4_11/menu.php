
    <?php 
    class Menu{

        private $type;
        private $arrayOpcion = [];

        public function __construct($type){
            $this->type= $type;
        }

        public function getType() {
                return $this->type;
        }
        public function insertar($arrayOpcion){

        echo "<a href='", $arrayOpcion->getEnlace() , "'><h3 style=background-color:", $arrayOpcion->getColorFondo(), ">", $arrayOpcion->getTitulo(),  "</h3></a>";
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