<!-- sortea2.php. Crea un formulario que te permita sortear un número de premios 
 entre un conjunto de participantes al igual que lo realiza 
 la página web https://www.sortea2.com/sorteos  -->

<!doctype html>
<html>
<head>
<style>
</style>
<title> sorteo </title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
Ve introduciendo los usuario  <input type="text" name="nombres"><br>
Añadir usuario<input type="submit" name="submit"> &nbsp; &nbsp;  Realizar sorteo<input type="submit" name="sorteo">
</form> 

<?php
//if (isset($_POST["nombres"])){
//$nombres = array($_POST["nombres"]);
//$anadidos = explode(",", $_POST["nombres"]);
//$nombres = array_merge($nombres, $anadidos);

//array_push($nombres, $_POST["nombres"]);
//print_r($nombres);
//}

if (isset($_POST["submit"]))
{
$travel = array("Automobile", "Jet", "Ferry", "Subway");
$travel = $_POST["travel"];
$added = explode(",", $_POST["nombres"]);
$travel = array_merge($travel, $added);


echo "<p> Here is the list with your additions:</p>";

echo "<ul>";

foreach ($travel as $t)
    {
    echo "<li>$t</li>";
    }

echo "</ul>";
}
?>


</body>
</html>
