<!-- sortea2.php. Crea un formulario que te permita sortear un número de premios 
 entre un conjunto de participantes al igual que lo realiza la página web https://www.sortea2.com/sorteos  -->

<!doctype html>
<html>
<head>
<style>
#resultado{
color: #FF0000;
font-size:20px;
}
</style>
<title> sorteo </title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="formulario">
Introduce los participantes: <br>
<textarea name="nombres" rows="20" cols="40"></textarea>  <br>
Debe tener como mínimo dos participantes.<br> <br>
Nº de premios:<br>
<input type="text" name="premios" <br>
<input type="submit" name="sorteo" value="Sortea!"> &nbsp; &nbsp;  <input type="submit" name="eliminar" value="Borrar usuarios">
</form> <br> <br>

<?php
$nombres = htmlspecialchars($_POST["nombres"]);
$premios = htmlspecialchars($_POST["premios"]);
$ganadores = explode("\n", $nombres);

if (isset($_POST["eliminar"])){
$nombres = "";
}

if (isset($_POST["sorteo"])){
  if (empty($premios) || isset($premios)<1){
    echo "El sorteo debe tener al menos 1 premio";
  }else if (empty($nombres) || $ganadores<2){
    echo "El sorteo tiene que tener como minimo dos personas";
  }else if (count($ganadores)<$premios){
    echo "Hay mas premios que participantes";
  }else{
    echo "<div id='resultado'>Resultados del sorteo</div>";
    for ($i=0;$i<$premios;$i++){
      $rando = rand(0, count($ganadores)-1); 
      echo "<ul>";
         echo "<li> Puesto " . $i+1  . ": " . $ganadores[$rando] . "</li>";
      echo "</ul>";
    }
  } 
}
//$nombres = array($_POST["nombres"]);
//$anadidos = explode(",", $_POST["nombres"]);
//$nombres = array_merge($nombres, $anadidos);

//array_push($nombres, $_POST["nombres"]);
//print_r($nombres);

//<script> MIRAR PREVENT DEFAULT Y FALTA HACER QUE NO SE REPITA EL NUMERO, ESTO IRIA FUERA PHP
//document.getElementById("formulario").addEventListener("click", function(event){
//  event.preventDefault()
//});
//</script>
?>
</body>
</html>
