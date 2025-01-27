<?php         //Mysqli procedural
//Conexion con BD 
  $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "xxxx";
  $dbname = "thsi_38097488_ejemplo";
  $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar campos vacíos
    if (empty($_POST['nombre']) || empty($_POST['password'])) {
        die("Error: Todos los campos son obligatorios.");
    }
    // Saneamiento de las entradas
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $password = htmlspecialchars(trim($_POST['password']));
    // Verificar si el usuario existe
    $query = "SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$password'";
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0){  //Al menos tengo un registro
            echo "Ha iniciado sesion";
        }else{
            echo "No existe el usuario";
        }
}
// Cierre de la conexiónd
  mysqli_close($enlace);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio sesion</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>

<!-- login.php. Realiza un script en PHP que solicite su 
 nombre de usuario y contraseña y lo autentique convenientemente si 
 está dado de alta en la tabla usuarios o muestre un mensaje de 
 error de error en caso contrario. -->