<!doctype html>
<html>
<meta charset="UTF-8">
<head></head>
<body>
    <?php  
      $caracter = '&#';
      $emoticono = rand(128512, 128586);
      $trueemoticono = $caracter . $emoticono;
      echo $trueemoticono;
    ?>
</body>
</html>
<!-- emoticono.php. Utilizando la función rand de PHP crea un script que muestre un emoticono 
 diferente cada vez que se cargue. Ten en cuenta que podemos 
 escribir en HTML los emoticonos haciendo uso de su codificación Unicode 
 (números entre 128512 y 128586). Investiga en W3Schools sobre cómo codificarlos. -->