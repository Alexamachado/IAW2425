<?php

$color="";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$value = $_POST['colorin'];
setcookie("color", $value,time() + ( 365 * 24 * 60 * 60), "/"); // 86400 = 1 day
}

$colora = $_COOKIE["color"];
//$colora = $_POST['colorin'];
?>

<html>



<head>
<style>
body{
        <?php
        if(isset($_COOKIE["color"])) {
    echo "Background-color: " . $colora . ";";
    //
    //$color= "style='background-color:$_COOKIE[$value]'";
    }
?>

}
</style>

</head>

<body>
<h1> color </h1>
<form action="color.php" method="POST" >
<input type="color" name="colorin">
<button type="submit">Pulse el boton </button>
</form>


</body>
</html>
