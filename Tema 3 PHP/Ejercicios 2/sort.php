<!doctype html>
<html>
<head><title> sort</title></head>
<body>
	<?php
        $palabras = ["Zaragoza", "abanico", "cangrejo", "burro", "watermelon"]; //segun codigo ASCII
        sort($palabras);
        $totalPalabras = count($palabras);
        for ($i=0;$i<=$totalPalabras-1;$i++){
              echo "$palabras[$i] <br>";
        }
       ?>
</body>
</html>
<!-- sort.php. Realiza un script que dado un array de palabras lo 
 presente en pantalla ordenado lexicograficamente.
-->