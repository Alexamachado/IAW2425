<!doctype html>
<html>
<head></head>
<body>
	<?php
    $dias = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
    $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
     
    echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    ?>
</body>
</html>

<!-- diasemana.php. Realiza un script PHP que utilizando Date obtenga el día de la 
 semana en el que se encuentra el servidor y en función del mismo muestre 
 un mensaje diferente según sea lunes, martes, miércoles, etc (utiliza switch). -->