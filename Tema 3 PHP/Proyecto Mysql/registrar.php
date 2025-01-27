<?php
// Conexión a la base de datos
$servername = "sql308.thsite.top"; // Nombre del servidor
$username = "thsi_38097488"; // Nombre de usuario
$password = "xxxxx"; // Contrasena
$database = "thsi_38097488_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$texto=$volver="";
$departamento = "0";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['contrasena']) || $_POST['departamento'] == "0") {
        $texto = "Error: Todos los campos son obligatorios.";
    }
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['contrasena']));
    $departamento = $_POST['departamento'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    $parts = explode('@', $email);
    $domain = array_pop($parts);
    $permitido = "iesamachado.org";
        if ($domain != $permitido){  //FALTA
       $texto = "Error: El correo tiene que ser del dominio @iesamachado.org.";
        }
    }

    $query = "SELECT id FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($enlace, $query);
    $resultado_assoc = mysqli_fetch_assoc($resultado);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<p>Error: El usuario ya está registrado.</p>";
    }
    else{
         $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$departamento'";
            $rdepartamento = mysqli_fetch_assoc(mysqli_query($enlace, $qdepartamento));
        $password_encrypted = crypt($password, '$6$rounds=5000$' . uniqid(mt_rand(), true) . '$');

        $query = "INSERT INTO usuarios (nombre, apellido, contrasena, email, id_departamento, rol) VALUES ('$nombre', '$apellido', '$password',  '$email', '$departamento', 'Nprivilegiado')";

        if (mysqli_query($enlace, $query)) {
            // Enviar correo electrónico de confirmación
            $asunto = "Registro exitoso";
            $mensaje = "Hola $nombre,\n\nGracias por registrarte. Estos son tus datos:\nNombre: $nombre\nApellidos: $apellido\nEmail: $email\n\nSaludos.";
            $cabeceras = "From: no-reply@mi-sitio.com";

            if (mail($email, $asunto, $mensaje, $cabeceras)) {
                $texto = "Usuario registrado correctamente. Se ha enviado un correo de confirmación.";
                $volver = "<button onclick='redirigir()'>Pulse para iniciar sesion</button>";
            } else {
                $texto = "Usuario registrado, pero no se pudo enviar el correo.";
                $volver = "<button onclick='redirigir()'>Pulse para iniciar sesion</button>";
            }
        } else {
            $texto = "Error al registrar el usuario: " . mysqli_error($enlace);
        }
    }
}

mysqli_close($enlace);
?>

<!-- Formulario de registro -->
<!DOCTYPE html>
<html>
<head>
    <title>Registro | Management Machado</title>
</head>
<body>
    <form method="POST" action="registrar.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellido" name="apellido"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>
        <label for="departamento">Departamento:</label>
        <select name="departamento" id="departamento">
            <option selected value="0"></option>
            <option value="1"> Lengua </option>
            <option value="2"> Matemáticas </option>
            <option value="3"> Educacion Física </option>
            <option value="4"> Informatica </option>
            <option value="5"> Física y Quimica </option>
        </select> <br>
        <button type="submit">Registrar</button>
    </form>

    <?php echo $texto;
        echo $volver; ?>
        
    <script>
    function redirigir(){
        window.location="login.php";
    }
    </script>

</body>
</html>



