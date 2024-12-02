<!doctype html>
<html>
<head><title> Tabla numeros</title></head>
<body>
	<?php
        $diccionario = ["hola"=>"hello", "adios"=>"bye", "masa"=>"table","coche"=>"car",
                        "bicicleta"=>"bike","ordenador"=>"computer"];
                     echo "<h1>Diccionario español - ingles </h1>";
                     echo "<ul>";
                     foreach ($diccionario as $palabraespanol => $palabraingles){
                            echo "<li>$palabraespanol se traduce como $palabraingles</li>";
                     };
                     echo "</ul>";
    ?>
</body>
</html>
<!-- foreach3.php. Crea un script en PHP que recorre un array de tweets y formatea 
 un documento HTML al usuario mostrando las distintas frases con una apariencia similar a la de Twitter. 
 En su ejecución define una función que genere el código necesario para mostrar el tweet.-->