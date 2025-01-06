<?php
$pagina = "https://elpais.com";
$coge = file_get_contents($pagina);
echo $coge;
?>


<!-- filegetcontents.php. Ilustra el funcionamiento de la función file_get_contents de PHP 
 descargando el contenido remoto de un sitio web en una cadena y mostrándolo por pantalla. -->