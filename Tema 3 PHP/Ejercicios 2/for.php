<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
    echo "<table border='1'>";
    for ($numero=1 ;$numero<=30; $numero++){ 
        echo "<td>" . $numero .  "</td>"; // \n salto linea
       // $numero + 1; nunca en un for
    }
    echo "</table>";
    ?>
</body>
</html>
<!-- for.php. Modifica el ejercicio anterior para realizar 
 el mismo script pero utilizando for y disponiendo los números en una fila.-->