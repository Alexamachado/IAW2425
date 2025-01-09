<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html> 

<!-- cookies.php. Crea diferentes cookies y envíalas al cliente, muéstralas 
 por pantalla y verifica su persistencia aún cerrando el navegador. 
 Familiarízate con la manera de establecer las cookies mediante la 
 función time() y piensa cómo podemos forzar al navegador del usuario 
 para “renovar” sus cookies. -->