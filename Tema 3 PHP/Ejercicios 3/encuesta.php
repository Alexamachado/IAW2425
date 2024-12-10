<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
$nombreerror = $apellidoserror = $descripcionerror  = $generoerror 
= $contrasenaerror = $paiserror  = "";

$nombre = $apellidos = $descripcion = $genero = $contrasena = $pais = "";

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

  if (empty($_POST["descripcion"])) {
    $descripcion = "";
  } else {
    $descripcion = test_input($_POST["descripcion"]);
  }

  if (empty($_POST["genero"])) {
    $generoerror = "Genero es obligatorio";
  } else {
    $genero = test_input($_POST["genero"]);
  }

    $pass1 = $_POST["contrasena"];
    $pass2 = $_POST["contrasena2"];
if (empty($pass1)) {
    $contrasenaerror = "La contraseña es obligatorio";
  }  else if ($pass1 !== $pass2){
	$contrasenaerror = "Las contraseñas no coinciden"; 
    } else {
    $contrasena = test_input($_POST["contrasena"]);
  }

if (empty($_POST["pais"])) {
    $paiserror = "Debes selecionar un pais";;
  }else{ 
  $pais=$_POST["pais"];}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="POST" action="formulario.php">
Nombre: <input type="text" name="nombre"><span class="error">* 
<?php echo $nombreerror;?></span>  <br>
Apellidos: <input type="text" name="apellidos"><span class="error">* 
<?php echo $apellidoserror;?></span> <br>
Contraseña: <input type="password" name="contrasena"><span class="error">* 
<?php echo $contrasenaerror;?></span> <br>
Repite la contraseña: <input type="password" name="contrasena2"><span class="error">* 
<?php echo $contrasenaerror;?></span> <br>
Descripcion: <textarea name="descripcion" rows="5" cols="40"></textarea><br><br>
Genero: <input type="radio" name="genero" value="Hombre">Hombre
<input type="radio" name="genero" value="Mujer">Mujer
<input type="radio" name="genero" value="No binario">No binario
<span class="error">* <?php echo $generoerror;?></span> <br>
Selecciona pais: <select name="pais">
		<option disabled selected value> selecciona </option>	
		<option value="España">España</option>
		<option value="Grecia">Grecia</option>
		<option value="Francia">Francia</option> </select> 
<span class="error">* <?php echo $paiserror;?></span> <br>
<input type="submit">
</form>
<br> 
<h3> Respuestas </h3>

<?php 
echo $nombre;
echo "<br>";
echo $apellidos;
echo "<br>";
echo $descripcion;
echo "<br>";
echo $genero;
echo "<br>";
echo $pais;

?>
</body>
</html>



<!-- encuesta.php. Crea un formulario que realice una encuesta 
 personal donde se utilicen distintos tipos de controles de 
 formularios: cajas de texto, desplegables, casillas de verificación, 
 botones de radio, etc. Cuando el servidor reciba las respuestas 
 mostrará un resumen detallado de las mismas en pantalla. -->