<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cuadrado</title>
</head> 
<body>
<h1> Cuadrado </h1>
<form action="cuadrado.php" method="GET" >
<input type="text" name="numero">
<input type="submit" value="Build">
</form>

<?php

    if (isset($_GET["numero"])){
	   $numero=$_GET["numero"];
	for($x=1;$x<=$numero;$x++){
    // echo str_repeat("*", $numero) . "<br>";    
	for($y=1;$y<=$numero;$y++){ echo"*";} //Hasta que x=numero ejecuta el segundo for y br
	echo "<br>";
}}

?>
</body>
</html>
