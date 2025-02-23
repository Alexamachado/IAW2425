<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
header("Content-type:application/octet-stream");
header("Content-Disposition:attachment;filename=archivo.txt");
readfile("archivo.txt");
exit; //Para que no se añada el html al archivo
}     //Tambien podria estar el php y html en dos archivos distintos
?>

<html>
<body>
<form method="post" action="descargararchivo.php">
<button type="submit">Descargar archivo</button>
</form>
</body>
</html>
