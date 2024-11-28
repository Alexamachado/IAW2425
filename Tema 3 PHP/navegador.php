<!doctype html>
<html>
<head></head>
<body>
	<?php
        echo "<p>Hola usuario, navegas con " . $_SERVER['HTTP_USER_AGENT'] . " desde la direccion IP" 
        . $_SERVER['REMOTE_ADDR'] . "</p>";
    ?>
</body>
</html>
<!-- navegador.php. Realiza un script que muestre en pantalla el 
 navegador que está utilizando el usuario. 
 Investiga variables superglobales en el manual de PHP. -->