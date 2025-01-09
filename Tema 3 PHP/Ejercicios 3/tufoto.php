<!doctype html>
<html>
<head>
<style>
</style>
<title> Tu foto </title>
</head>
<body>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
enctype="multipart/form-data">
Nombre: <input type="text" name="nombre"><br>
Suba la foto <input type="file" name="foto">
<br> <input type="submit" name="submit">
</form><br>

<?php
if(isset($_POST["submit"])) {

$directorio = "fotitos/";
$fila = $directorio . basename($_FILES["foto"]["name"]);
//$subida = 1; Para saber si se ha subido antes
//$imageFileType = strtolower(pathinfo($fila, PATHINFO_EXTENSION)); Para convertirlo a minuscula
//if (isset($_POST["foto"])){
 $comprobar = getimagesize($_FILES["foto"]["tmp_name"]);
 //set_error_handler("error");
 //$mensajeerror ="Tienes que subir una foto y poner un nombre.";
 //function error($errno, $mensajeerror ){
 //	echo "[$errno] $mensajeerror";
 //} 
    if($comprobar !== false && !empty($_POST["nombre"])) {
      move_uploaded_file($_FILES["foto"]["tmp_name"],$fila);
      echo "<img src='" . $fila  . "' width='300px' height='300px' ><br>";
      echo "Hola " . $_POST["nombre"] . " <br>";
      echo "La fila es una foto - " . $comprobar["mime"] . ".";
      $subida = 1;
    } else {
      echo "Tienes que subir una foto y poner un nombre.";
      $subida = 0;
    }
 }else{
 echo "Tienes que subir foto y poner un nombre";
 } 
//}
?>

</body>
</html>





<!-- tufoto.php. Crea un formulario que permita al usuario introducir su nombre y subir 
 un fichero al servidor con una imagen de perfil. El script php procesará la entrada 
 de datos y devolverá al cliente web una página html con la imagen y el nombre de 
 usuario como si de una red social se tratase. -->
