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
<!-- superglobales.php. Realiza un script en PHP que muestre al usuario la dirección IP desde 
 la que se está conectando, el navegador que utiliza y la página 
 previa que lo ha referido. Utiliza la variable superglobal $_SERVER.-->