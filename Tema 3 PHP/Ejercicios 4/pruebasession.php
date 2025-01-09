
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Se han configurado las variables de sesion.";
?>

</body>
</html> 


<!-- pruebasession.php. Realiza un script en PHP que ilustre el funcionamiento de las 
 sesiones en PHP. Confirma que las sesiones se mantienen en el sitio web incluso 
 aún cambiando de página web dentro del mismo servidor. Prueba a cerrar el navegador 
 y acceder de nuevo a la página/s para verificar que si la sesión persiste o no. -->