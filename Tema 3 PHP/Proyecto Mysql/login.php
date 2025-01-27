<?php         
session_start(); 
  $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "xxxxxx";
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
    $query = "SELECT id, rol FROM usuarios WHERE nombre='$nombre' AND contrasena='$password'";
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0){  //Al menos tengo un registro
    $fila = mysqli_fetch_assoc($resultado);
            //if ($fila["id"]) {   
                $_SESSION['nombre'] = "$nombre";
                $_SESSION['rol'] = $fila['rol'];
            header("Location: index.php");
            /*} else {
                echo "Este usuario no tiene los permisos para iniciar sesion";
            }*/
    }else{
        echo "No existe el usuario";
        }
}
// Cierre de la conexión
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
        <button type="submit">Iniciar sesion</button>
    </form>
</body>
</html>
