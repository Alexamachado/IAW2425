<!doctype html>
<html>
<head>
	<title>Una web con PHP</title>
</head>
<body>
	<h1>Encabezado</h1>
	<?php
    $x = "Hola mundo"
    $y = "desde PHP" 
    echo "<h1>" $x . "" . $y "</h1>"; ?>
</body>
</html>

<!-- holamundo3.php. Podemos intercalar nuestros scripts PHP dentro del código HTML. 
 Modifica el código anterior para que el cliente web reciba el mensaje en un 
 encabezado de nivel 1 en el interior de un documento realizado con Bootstrap. -->