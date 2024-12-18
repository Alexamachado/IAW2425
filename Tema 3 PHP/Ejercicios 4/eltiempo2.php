<?php
    //$text=file_get_contents("https://www.eltiempo.es/sevilla.html");
    $tiempo = "https://www.eltiempo.es/sevilla.html"
    $text=file_get_contents($tiempo);
    $resultado = explode("<span class='degrees' data-temperature=",$text);                   // No funciona
    print_r($resultado[0]);
?>