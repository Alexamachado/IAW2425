<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
        $nombreArray = ["Hola","como estas","yo estoy bien","luisito IAW usa chatgpt","A caballo regalado no le mires los dientes
                     A comer", "la clase de IAW estas siendo aburrida"];
                     echo "<ul>";
                     foreach ($nombreArray as $elementoDelArray){
                            echo "<li>$elementoDelArray</li>";
                     };
                     echo "</ul>";
    ?>
</body>
</html>
<!-- foreach1.php. Crea un array con 4 o 5 refranes. Utiliza foreach para 
 mostrar todos los refranes en pantalla cada uno de ellos en un párrafo diferente.-->