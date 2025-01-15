<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
$nombreerror = $apellidoserror = $emailerror  = $dnierror 
= $diaentradaerror = $reservaerror = $habitacionerror  = "";

$nombre = $apellidos = $email = $dni = $diaentrada = $reserva 
= $habitacion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nombre"])) {
    $nombreerror = "Hace falta el nombre";
  } else {
    $nombre = test_input($_POST["nombre"]);
  }
  
  if (empty($_POST["apellidos"])) {
    $apellidoserror = "Hace falta el apellido";
  } else {
    $apellidos = test_input($_POST["apellidos"]);
  }

  if (empty($_POST["email"])) {
    $emailerror = "Hace falta el email";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["dni"])) {
    $dnierror = "DNI es obligatorio";
  } else {
    $dni = test_input($_POST["dni"]);
  }


if (empty($_POST["diaentrada"])) {
    $diaentradaerror = "El dia de entrada es obligatorio";
    } else {
    $diaentrada = test_input($_POST["diaentrada"]);
  }

if (empty($_POST["reserva"])) {
    $reservaerror = "Debes selecionar el numero de dias";
  }else{ 
  $reserva= test_input($_POST["reserva"]);
}


if (empty($_POST["habitacion"])) {
    $habitacionerror = "Debes selecionar una habitacion";
  }else{ 
  $habitacion= test_input($_POST["habitacion"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
}
?>

<form method="POST" action="reserva.php">
Nombre: <input type="text" name="nombre"><span class="error">* 
<?php echo $nombreerror;?></span>  <br>
Apellidos: <input type="text" name="apellidos"><span class="error">* 
<?php echo $apellidoserror;?></span> <br>
Email <input type="password" name="email"><span class="error">* 
<?php echo $emailerror;?></span> <br>
DNI: <input type="password" name="dni"><span class="error">* 
<?php echo $dnierror;?></span> <br>
Dia entrada: <input type="date" name="diaentrada"><span class="error">* 
<?php echo $diaentradaerror;?></span> <br>
Numero dias reserva: <input type="number" name="reserva"><span class="error">* 
<?php echo $reservaerror;?></span> <br>
Selecciona pais: <select name="habitacion">
		<option disabled selected value> selecciona </option>	
		<option value="30">simple(30€)</option>
		<option value="50">doble(50€)</option>
		<option value="80">triple(80€)</option>
		<option value="100">suite(50€)</option> </select> 
<span class="error">* <?php echo $habitacionerror;?></span> <br>
<input type="submit">
</form>
<br> 
<h3> Respuestas </h3>

<?php 
echo $nombre;
echo "<br>";
echo $apellidos;
echo "<br>";
echo $email;
echo "<br>";
echo $dni;
echo "<br>";
echo $diaentrada;
echo "<br>";
echo $reserva;
echo "br";
echo $habitacion * $reserva;


?>
</body>
</html>

