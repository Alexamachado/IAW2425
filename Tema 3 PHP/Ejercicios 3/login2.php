
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
<h1> Sistema de autenticacion</h1>
    <form action="login.php" method="POST">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" value="Enviar">
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $pass = $_POST["pass"];

        if (isset($nombre) && isset($pass)){
          if ($nombre=="alex" && $pass=="1234"){
              echo " Puedes pasar ";
            }else{
                echo " HACKERRRRRRR ";}
           }}
?>

</body>
</html>