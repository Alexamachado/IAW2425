<!doctype html>
<html>
<head>
<style>
</style>
<title> sorteo </title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
Ve introduciendo los usuario  <input type="text" name="nombres"><br>
Añadir usuario<input type="submit" name="anadir"> &nbsp; &nbsp;  Realizar sorteo<input type="submit" name="sorteo">
</form> 

<?php
if (isset($_POST["nombres"])){
$nombres = array($_POST["nombres"]);
$anadidos = explode(",", $_POST["nombres"]);
$nombres = array_merge($nombres, $anadidos);

//array_push($nombres, $_POST["nombres"]);
print_r($nombres);
}
?>
</body>
</html>

<!-- sorteo.php. Crea un formulario que te permita sortear un premio entre el número de 
participantes que el usuario introduzca en una caja de texto; esto es, el usuario envía 
50 al servidor y el servidor se encargará de escoger un número aleatorio entre 1 y 50 
para mostrarlo en pantalla.   -->


