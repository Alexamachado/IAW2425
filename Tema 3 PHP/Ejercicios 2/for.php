<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
    $numero = 1; //Empezamos por numero
    echo "<table border='1'>";
    for ($numero=1 ;$numero<=100; $numero++){ //Mil primeros impares $total*2
        echo "<tr><td>" . $numero .  "</td></tr>\n"; // \n salto linea
        $numero + 1; //nunca en un for
    }
    echo "</table>";
    ?>
</body>
</html>
<!-- for.php. Modifica el ejercicio anterior para realizar 
 el mismo script pero utilizando for y disponiendo los números en una fila.-->