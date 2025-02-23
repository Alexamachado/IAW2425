<?php
include('templates/conexion.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//require_once __DIR__ . '/vendor/autoload.php';

$texto=$volver="";
$departamento = "0";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['contrasena']));
    $password2 = htmlspecialchars(trim($_POST['contrasena2']));
    $departamento = $_POST['departamento'];
    $pemail = substr($email,-16);

    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['email']) || empty($_POST['contrasena']) || empty($_POST['contrasena2']) || $_POST['departamento'] == "0") {
        $texto = "Error: Todos los campos son obligatorios.";
    }else if($pemail != "@iesamachado.org"){  
       $texto = "Error: El correo tiene que ser del dominio @iesamachado.org.";
    }else if ($password != $password2){
    $texto = "Las contraseñas deben de ser iguales";
    }else{
    $query = "SELECT id FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($enlace, $query);
    $resultado_assoc = mysqli_fetch_assoc($resultado);
    if (mysqli_num_rows($resultado) > 0) {
        $texto="<p>Error: El usuario ya está registrado.</p>";
    }
    else{
         $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$departamento'";
            $rdepartamento = mysqli_fetch_assoc(mysqli_query($enlace, $qdepartamento));
        $password_encrypted = crypt($password, '$6$rounds=5000$' . uniqid(mt_rand(), true) . '$');

        $query = "INSERT INTO usuarios (nombre, apellido, contrasena, email, id_departamento, rol) VALUES ('$nombre', '$apellido', '$password',  '$email', '$departamento', 'Nprivilegiado')";

        if (mysqli_query($enlace, $query)) {
           /* // Enviar correo electrónico de confirmación
            $asunto = "Registro exitoso";
            $mensaje = "Hola $nombre,\n\nGracias por registrarte. Estos son tus datos:\nNombre: $nombre\nApellidos: $apellido\nEmail: $email\n\nSaludos.";
            $cabeceras = "From: no-reply@mi-sitio.com";

         //   if (mail($email, $asunto, $mensaje, $cabeceras)) {
           //     $texto = "Usuario registrado correctamente. Se ha enviado un correo de confirmación.";
            //    $volver = "<button onclick='redirigir()'>Pulse para iniciar sesion</button>";
           // } else { */
           $mail = new PHPMailer(true);

            try {
                // Configure PHPMailer
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
               // Configure SMTP Server
                $mail->Host = 'smtp.gmail.com';
                $mail->Username = 'alexandroguerrero02@iesamachado.org';
                $mail->Password = 'zqpd txvd cjsx ihyu';

                // Configure Email
                $mail->setFrom('alexandroguerrero02@iesamachado.org', 'Sistema de Gestión de Incidencias');
                $mail->addAddress($email); //$nombre
                $mail->Subject = 'Bienvenido al Sistema de Gestión de Incidencias';
                $mail->isHTML(true);
                $mail->Body    = '<h1>¡Bienvenido ' . $nombre . '!</h1>
                                <p>Gracias por registrarte en el sistema de gestión de incidencias.</p>
                                <p>Ahora podrás gestionar tus incidencias de manera fácil y rápida.</p>';
                $mail->AltBody = '¡Bienvenido! Gracias por registrarte en el sistema de gestión de incidencias.';


    // send mail
                $mail->Send();
                $texto = 'Correo de bienvenida enviado correctamente.';
                $volver = "<button onclick='redirigir()'>Iniciar sesion</button>";
            } catch (Exception $e) {
                $texto = "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
            }
               // $texto = "Usuario registrado, pulse el boton de al lado para iniciar sesion.";
              //  $volver = "<button onclick='redirigir()'>Iniciar sesion</button>";
            //}
        } else {
            $texto = "Error al registrar el usuario: " . mysqli_error($enlace);
        }
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
<h2> Registro nuevo usuario </h2>
<button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script> <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellido" name="apellido"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena"><br>
        <label for="password2">Repita la contraseña</label>
        <input type="password" id="contrasena2" name="contrasena2"><br>
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
    </form><br>

    <?php echo $texto;
        echo " " . $volver; ?>
        
    <script>
    function redirigir(){
        window.location="login.php";
    }
    </script>

</body>
</html>



