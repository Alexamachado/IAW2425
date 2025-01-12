<!doctype html>
<html>
<head>
<style>
</style>
<title> sorteo </title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
Introduce un numero  <input type="text" name="numero"><br>
Numero random <input type="submit" name="submit">
</form> 

<?php
if (isset($_POST["submit"])){
  $numero = htmlspecialchars($_POST["numero"]);
  if (isset($numero) && $numero>1 && round($numero,0)==$numero){
	echo "<p>Premio para el número " . rand(1,$numero) . "</p>";
  }else{
  echo "<p>Debe introducir un numero positivo mayor que uno</p>";}
}
?>
</body>
</html>

<!-- sorteo.php. Crea un formulario que te permita sortear un premio entre el número de 
participantes que el usuario introduzca en una caja de texto; esto es, el usuario envía 
50 al servidor y el servidor se encargará de escoger un número aleatorio entre 1 y 50 
para mostrarlo en pantalla.   -->


