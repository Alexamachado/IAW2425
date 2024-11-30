<!doctype html>
<html>
<head></head>
<body>
	<?php
    $image= imagecreatetruecolor(400, 400);
    $color = rand(0x000000, 0xFFFFFF); 
    imagerectangle($image, 300, 300, 300, 300, $color);
    ?>
</body>
</html>
<!-- cuadradoColor.php. Investiga la función rand de PHP y 
 realiza un script que cada vez que se cargue muestre una caja 300x300 de color aleatorio.-->