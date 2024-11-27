<!doctype html>
<html>
<head>
	<title>Una web con PHP</title>
</head>
<body>
	<?php
    $a = "Hola mundo";
    $b = "soy una cadena"; //cadena 
    var_dump($a);
    echo "<br>";
    var_dump($b);

    echo "<br>";

    $c = 5985; //entero
    var_dump($c);

    echo "<br>";

    $d = 10.345; //real
    var_dump($d);

    echo "<br>";

    $e = true; //booleanos
    $f = false
    var_dump($e);
    echo "<br>";
    var_dump($f);

    echo "<br>";

    $cars = array("Volvo","BMW","Toyota"); //array
    var_dump($cars);
     ?>
</body>
</html>
<!-- tiposdedatos.php. Realiza un script en PHP que muestre información 
 de variables de distintos tipos de datos: enteros, reales, cadenas, 
 booleanas y arrays. Muestra los datos utilizando la función var_dump. -->