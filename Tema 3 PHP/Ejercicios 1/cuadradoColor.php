<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuadrado Color</title>
    <?php 
        $rojo = rand(0,255);
        $verde = rand(0,255);
        $azul= rand(0,255);
        $color = "rgb($rojo, $verde, $azul)";
    ?>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        div{
            width: 300px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: <?= $color ?>;
        }
    </style>
</head>
<body>
    <div>Tengo un color aleatorio, prueba con F5</div>

</body>
</html>
<!-- cuadradoColor.php. Investiga la función rand de PHP y 
 realiza un script que cada vez que se cargue muestre una caja 300x300 de color aleatorio.-->


<!-- 	
    $image= imagecreatetruecolor(400, 400);
    $color = rand(0x000000, 0xFFFFFF); 
    imagerectangle($image, 300, 300, 300, 300, $color);
     -->