<?php         
session_start();
  include('templates/conexion.php');

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
                $_SESSION['sesion'] = "1";
            header("Location: index.php");
    }else{
        echo "Usuario o contraseña incorrecta, vuelva a intentarlo";
        }
}
// Cierre de la conexión
  mysqli_close($enlace);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio sesión | Management Machado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
     body {
            padding: 1em;
        }
    </style>
</head>
<body>
<h2> Inicio sesion </h2> <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Iniciar sesion</button>
    </form>
    <!--<button onclick="window.location='registrar.php';">Registrarse como nuevo usuario</button>-->
</body>
</html>
