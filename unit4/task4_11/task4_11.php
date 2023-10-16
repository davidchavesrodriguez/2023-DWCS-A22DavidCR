<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Menú Orientado a Objetos con PHP</title>
</head>
<!-- Crear una clase para generar un menú sencillo.

Ten en consideración lo siguiente:

    Cada menú tiene una lista con opciones.
    Cada menú tiene un tipo: horizontal o vertical.
    Podemos añadir opciones al menú.
    Cada opción tiene: título, enlace y color de fondo.
 -->
 
<body>
<?php
include_once("menu.php");

$menu1=new Menu('vertical');

$opcion1=new Opcion('Google','http://www.google.com','#C3D9FF');
$menu1->insertar($opcion1);
$opcion2=new Opcion('Yahoo','http://www.yahoo.com','#CDEB8B');
$menu1->insertar($opcion2);
$opcion3=new Opcion('MSN','http://www.msn.com','#C3D9FF');
$menu1->insertar($opcion3);

?>
</body>
</html>