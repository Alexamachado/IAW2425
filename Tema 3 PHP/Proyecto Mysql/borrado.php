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
  $result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = htmlspecialchars(trim($_POST['borrado']));
    if (empty($titulo)){
        $result = "Tienes que elegir una actividad";
    }
  $queryfirst = "SELECT titulo FROM actividad WHERE titulo='$titulo'";
  $query = "DELETE FROM actividad WHERE titulo='$titulo'";
  $resultado = mysqli_query($enlace, $queryfirst);
          if (mysqli_num_rows($resultado) > 0){
            mysqli_query($enlace, $query);
            $result = "Borrado realizado correctamente";
        } else {
            $result = "La actividad no existe";
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
        <label for="borrado">Introduce titulo actividad:</label>
        <input type="text" name="borrado">
        <button type="submit">Borrar actividad</button> <br>
    </form>
    <?php echo $result ?>
</body>
</html>