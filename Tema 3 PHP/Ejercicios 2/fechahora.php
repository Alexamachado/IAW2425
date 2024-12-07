<!doctype html>
<html>
<head></head>
<body>
	<?php
    $dias = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"];
    $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
       //Cojeme de dentro del [array] $dias aquel que tiene este (dia numerico) especifico 
    echo date('H')+1 . ":" . date('i') . " " $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    ?>  
</body>
</html>

<!-- fechahora.php. Realiza un script PHP que muestre la fecha y la hora.
¿Serías capaz de mostrarla en español? -->