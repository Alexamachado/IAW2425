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
<!-- foreach2.php. PHP tiene la posibilidad de utilizar lo que se conocen como arrays 
 asociativos(clic aquí para más información). Realiza un script en PHP que ilustre el 
 uso de arrays asociativos mediante el uso de parejas “palabraEnEspañol” => “PalabraEnInglés”. 
 Crea el array con 5 palabras, sus respectivas traducciones y muestra el total de 
 las palabras que contiene el array asociativo usando una función que 
 las cuente así como las mismas con su traducción al lado.-->