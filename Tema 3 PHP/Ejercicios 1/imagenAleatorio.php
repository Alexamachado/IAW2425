<!doctype html>
<html>
<head></head>
<body>
	<?php
    $image = array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg")
    $rando = rand(1, 5);
    echo "<img src=>" $image[$rando] ">";    // echo "<img src=>" $rando . "" . $y ">"; 
    ?>
</body>
</html>
<!-- imagenAleatoria.php. Realiza un script que cada vez que se cargue 
 muestre una imagen aleatoria contenida en el servidor. Utilice arrays.-->