<?php
    $tabla="";
    if (isset($_POST["numero"])){
	   $numero=$_POST["numero"];
	for($x=1;$x<=10;$x++){
    // echo str_repeat("*", $numero) . "<br>";    
	//for($y=1;$y<=$numero;$y++){ echo"*";} //Hasta que x=numero ejecuta el segundo for y br
   $tabla .= "&nbsp; &nbsp;" . $numero . "x" . $x . "=" . $numero * $x . "<br>";
}}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for</title>
</head> 
<body>
<h1> for </h1>
<form action="for.php" method="POST" >
<input type="text" name="numero">
<button type="submit">Pulse el boton </button>
</form>

<?php echo  $tabla ?>


</body>
</html>
