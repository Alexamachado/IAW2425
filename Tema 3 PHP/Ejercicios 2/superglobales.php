<!doctype html>
<html>
<head><title> </title></head>
<body>
	<?php
    echo "Te estas conectando desde la IP :" . $_SERVER['REMOTE_ADDR'];
    echo "<br>"
    echo "Tu navegador es :" .  $_SERVER['HTTP_USER_AGENT'];
   echo "<br>"
    echo "Vienes de la pagina IP :" .  $_SERVER['HTTP_REFERER'];

    /*<?php   //en index.php
        echo "<a href='superglobales.php'>Clic</a>
      ?> <?php phpinfo(); ?>*/

    ?>
</body>
</html>
<!-- superglobales.php. Realiza un script en PHP que muestre al usuario la dirección IP desde 
 la que se está conectando, el navegador que utiliza y la página 
 previa que lo ha referido. Utiliza la variable superglobal $_SERVER.-->