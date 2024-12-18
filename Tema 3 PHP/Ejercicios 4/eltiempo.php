<?php
    $text=file_get_contents("eltiempo.html");
    $resultado = print_r(explode("<td>",$text)); //El <td> hace de separador
    print_r($resultado[4]);
?>