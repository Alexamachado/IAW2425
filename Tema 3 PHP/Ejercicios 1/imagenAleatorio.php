<!doctype html>
<html>
<head></head>
<body>
	<?php
    $image = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"];
    $rando = rand(0, count($image)-1);
    $fotoaleatoria = $image[$rando];
    echo "<img src='" . $fotoaleatoria . "'>";    // echo "<img src=>" $rando . "" . $y ">"; 
    ?>
</body>
</html>
<!-- imagenAleatoria.php. Realiza un script que cada vez que se cargue 
 muestre una imagen aleatoria contenida en el servidor. Utilice arrays.-->