<?php
$host = $_SERVER['HTTP_HOST'];
$url =rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
 header("Location: http://$host$url/saludo.php");
?>
