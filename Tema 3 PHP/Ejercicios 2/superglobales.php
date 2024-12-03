<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
    echo $_SERVER['REMOTE_ADDR'];
    echo "<br>"
    echo $_SERVER['HTTP_USER_AGENT'];
   echo "<br>"
    echo $_SERVER['REQUEST_URI'];
    ?>
</body>
</html>
<!-- superglobales.php. Realiza un script en PHP que muestre al usuario la dirección IP desde 
 la que se está conectando, el navegador que utiliza y la página 
 previa que lo ha referido. Utiliza la variable superglobal $_SERVER.-->