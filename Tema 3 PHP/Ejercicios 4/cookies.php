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





<!-- cookies.php. Crea diferentes cookies y envíalas al cliente, muéstralas 
 por pantalla y verifica su persistencia aún cerrando el navegador. 
 Familiarízate con la manera de establecer las cookies mediante la 
 función time() y piensa cómo podemos forzar al navegador del usuario 
 para “renovar” sus cookies. -->