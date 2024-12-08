<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
    $numero = 1; //Empezamos por numero
    $total = 100; //Llegamos hasta diez
    echo "<table border='1'>";
    while ($numero<=$total){ //Mil primeros impares $total*2
        echo "<tr><td>" . $numero .  "</td></tr>\n"; // \n salto linea
        $numero +=2; // $numero = $numero + 1; $numero++;
    }
    echo "</table>";
    ?>
</body>
</html>
<!-- while.php. Utilizando una estructura repetitiva while implementa un 
 script PHP que se encargue de crear una tabla en HTML con todos 
 los números del 1 al 10 dispuestos en una columna.-->

 <!-- Otra forma seria con div y border-style y width-->