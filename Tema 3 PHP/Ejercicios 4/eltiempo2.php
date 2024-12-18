<?php
    $text=file_get_contents("https://www.eltiempo.es/sevilla.html");
    $resultado = explode("",$text)                   // No funciona
    print_r($resultado[4]);
?>