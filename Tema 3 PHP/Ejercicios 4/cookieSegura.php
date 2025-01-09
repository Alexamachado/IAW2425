<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/","",false,true); // 86400 = 1 day

?>

<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Bienvenido por primera vez";
} else {
  echo "Bienvenido otra vez";
}
?>

</body>
</html> 

<!-- En base al ejercicio anterior, modifica las cookies desde el navegador web con 
alguna extensión propia del navegador que estés utilizando; por ejemplo, la popular 
extensión Web Developer de chrispederick.com. ¿Qué problemas pueden existir si el 
“lado cliente” puede “modificar” las cookies de sesión?¿Cómo podemos evitar este riesgo en PHP?
Realiza un script de nombre cookieSegura.php que impida que el “lado cliente” modifique las 
cookies que envía el servidor. -->