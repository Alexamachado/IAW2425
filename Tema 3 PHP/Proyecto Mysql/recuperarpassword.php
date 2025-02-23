<?php
 include('templates/conexion.php');
 $texto="";
// file: gmail.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//require_once __DIR__ . '/vendor/autoload.php';
//require 'vendor/autoload.php';
// Llamada a la función con el correo ingresado por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $emailUsuario = htmlspecialchars(trim($_POST['email']));
     $query = "SELECT email FROM usuarios WHERE email='$emailUsuario'";
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0){
        // El correo existe, generar un token único
        $token = bin2hex(random_bytes(16));  // Genera un token aleatorio
        $fechaExpiracion = date("Y-m-d H:i:s", strtotime("+1 hour"));  // Establece la fecha de expiración del token

        // Almacena el token en la base de datos
       // $conexion->query("INSERT INTO password_resets (email, token, expiracion) VALUES ('$emailUsuario', '$token', '$fechaExpiracion')");

        $enlaceRecuperacion = "http://tusitio.com/recuperar_contraseña.php?token=$token";

$mail = new PHPMailer(true);

try {
    // Configure PHPMailer
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Configure SMTP Server
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'alexandroguerrero02@iesamachado.org';
    $mail->Password = 'zqpd txvd cjsx ihyu';

    // Configure Email
    $mail->setFrom('alexandroguerrero02@iesamachado.org', 'Soporte');
    $mail->addAddress($emailUsuario);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->isHTML(true);
    $mail->Body    = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$enlaceRecuperacion'>$enlaceRecuperacion</a>";


    // send mail
    $mail->Send();
    $texto = 'Correo de recuperación enviado correctamente.';
} catch (Exception $e) {
    $texto = "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
}
}else {
    $texto = "No hay ningun usuario con tal correo";
}}

?>


<!DOCTYPE html>
<html>
<head>
    <title> Recuperar contraseña| Management Machado</title>
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
<h2> Recuperación contraseña </h2> 
<button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script> <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nombre">Correo electronico:</label>
        <input type="text" name="email"><br>
        <button type="submit">Recuperar contraseña</button>
    </form><br>

    <?php echo $texto ?>
    <br> <br>
    <!--<button onclick="window.location='registrar.php';">Registrarse como nuevo usuario</button>-->
    <button onclick='redirigir()'>Volver a la pagina de login</button>
     <script>
    function redirigir(){
        window.location="login.php";
    }
    </script>
</body>
</html>
