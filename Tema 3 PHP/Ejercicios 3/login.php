
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
<h1> Sistema de autenticacion</h1>
<form action="login.php" method="POST"></form>
    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" value="pass">
    <input type="submit" value="Login">
</form>
<?php
    if (isset($_POST["usuario"]) && isset($_POST["pass"]))
    {
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["pass"]);
         if( $usuario=="admin" && $password=="H4CK3R4$1R") //NO VA
              echo "<p>Bienvenido amo</p>";
            else
                echo "<p>No puedes pasar hacker</p>";
     }

?>

</body>
</html>





<!-- login.php. Crea un formulario que permita introducir un usuario y una contraseña. Si el usuario enviado al servidor es “admin” y la contraseña “H4CK3R4$1R” entonces el servidor nos mostrará el mensaje “Acceso concedido”; en caso contrario, “Acceso denegado”.
Reflexiona:
¿Qué método deberíamos utilizar para enviar los datos al servidor?
¿Cómo podemos “sanear” la entrada de datos para evitar inyecciones de código?
 -->