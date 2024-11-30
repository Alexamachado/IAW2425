<!doctype html>
<html>
<head>
	<title>Una web con PHP</title>
</head>
<body>
	<h1>Encabezado</h1>
	<?php
    $image = array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg")
    $rando = rand(1, 5);
    echo "<img src=>" $image[$rando] ">";    // echo "<img src=>" $rando . "" . $y ">"; 
    ?>
</body>
</html>
<!-- imagenAleatoria.php. Realiza un script que cada vez que se cargue 
 muestre una imagen aleatoria contenida en el servidor. Utilice arrays.-->