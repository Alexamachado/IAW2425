<?php         
session_start();
  include('templates/conexion.php');
  $texto="";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar campos vacíos
    if (empty($_POST['nombre']) || empty($_POST['password']) || empty($_POST['email'])) {
        $texto = "Error: Todos los campos son obligatorios.";
    } else {
    // Saneamiento de las entradas
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $password = htmlspecialchars(trim($_POST['password']));
        $email = htmlspecialchars(trim($_POST['email']));
    // Verificar si el usuario existe
        $query = "SELECT id, rol, ultimasesion FROM usuarios WHERE nombre='$nombre' AND contrasena='$password' AND email='$email'";
        $resultado = mysqli_query($enlace, $query);
        if (mysqli_num_rows($resultado) > 0){  //Al menos tengo un registro
        $fila = mysqli_fetch_assoc($resultado);
            //if ($fila["id"]) {   
                $_SESSION['nombre'] = "$nombre";
               if ($fila["ultimasesion"] != "" ){ 
                $_SESSION['ultimasesion'] = $fila["ultimasesion"];
                }
                $_SESSION['rol'] = $fila['rol'];
                $_SESSION['id'] = $fila['id'];
                $_SESSION['sesion'] = "1";

                setlocale(LC_TIME, 'es_ES', 'spanish');
                $fecha = strftime('%d de %B a las %H:%M horas');
                $updatelast = ("UPDATE usuarios SET ultimasesion = '$fecha' WHERE email='$email'");
                $querysesion = mysqli_query($enlace, $updatelast);
            header("Location: index.php");
        }else{
            $texto = "Usuario, email o contraseña  incorrecta, vuelva a intentarlo";
        }
}   }
// Cierre de la conexión 
  mysqli_close($enlace);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio sesión | Management Machado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link id="stylesheet" rel="stylesheet" href="templates/light.css">
    <style>
     #botonestilo{
            position: absolute;
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        body {
            padding: 1em;
        }
    </style>
</head>
<body>
<h2> Inicio sesion </h2> 
<button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script> <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="nombre">Correo electronico:</label>
        <input type="text" id="email" name="email"><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Iniciar sesion</button>
    </form><br>

    <?php echo $texto ?>

    <!--<button onclick="window.location='registrar.php';">Registrarse como nuevo usuario</button>-->
    <button onclick='redirigir()'>¿Has olvidado tu contraseña?</button>
     <script>
    function redirigir(){
        window.location="recuperarpassword.php";
    }
    </script>
</body>
</html>
