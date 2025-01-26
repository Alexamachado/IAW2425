<?php
//Conexion con BD 
  $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "xxxx";
  $dbname = "thsi_38097488_ejemplo";
  $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }
  $queryprincipio = "SELECT titulo FROM actividades";
  $resultadoprincipio = mysqli_query($enlace, $queryprincipio);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = ($_POST['borrado']);
    $result = ""
    if ($titulo == "0" ) {
        $result = "Tienes que elegir una actividad";
    }
  
//Construcción de la Query
  $query = "DELETE FROM actividades WHERE titulo='$titulo'";
  $resultado = mysqli_query($enlace, $query);
        if($resultado){
            $result = "Borrado realizado correctamente";
        }
}
// Cierre de la conexión
  mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Aplicación CRUD PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  </head>
  <body>
    <h2> Borrado de actividades </h2>
 <form method="POST" action="borrado.php">
        <label for="borrado">Selecciona nombre actividad:</label>
        <select name="borrado" id ="borrado"><br>
           <option selected value="0" disable></option>
            <option value="3">3</option>
            </select>
        <button type="submit">Borrar actividad</button>

    <?php echo $result ?>
    </form>
</body>
</html>