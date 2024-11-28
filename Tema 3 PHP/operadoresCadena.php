<!doctype html>
<html>
<head></head>
<body>
	<?php
   $txt1 = "Hello";
   $txt2 = " world!";
   $mensaje = $txt1 . $txt2 
   echo "<h1>$mensaje</h1>";

   echo "<br>";
   
   $txt1 .= $txt2; // $cadena1 = $cadena1 . $cadena2
   echo $txt1;
   ?>
</body>
</html>

<!-- operadoresCadena.php. Realiza un script en PHP donde visualices 
 cómo utilizar diferentes operadores con variables de tipo cadena. -->