<?php
session_start();
if (isset($_SESSION['numero']) && $_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] ){
$numero = $_SESSION['numero'];
echo "Bienvenido es su " . $numero . "º visita";
$_SESSION['numero'] = $numero + 1; 
}else{
echo "Bienvenido es su primera visita";
$_SESSION['numero'] = 2;
$_SESSION['ip']= $_SERVER['REMOTE_ADDR'];
}



/* Realiza un script que utilice sesiones para contar cuantas 
veces un usuario ha visitado la pagina  */
?>

