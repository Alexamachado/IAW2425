<?php
session_start(); 
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");}
 include('templates/conexion.php');
 
  $result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $borrado = htmlspecialchars(trim($_POST['borrado']));
    if (empty($borrado)){
        $result = "Tienes que poner una actividad";
    } else {
     $queryfirst = "SELECT titulo FROM actividad WHERE titulo='$borrado'";
     $query = "DELETE FROM actividad WHERE titulo='$borrado'";
     $resultado = mysqli_query($enlace, $queryfirst);
          if (mysqli_num_rows($resultado) > 0){
            mysqli_query($enlace, $query);
            $result = "Borrado realizado correctamente";
        } else {
            $result = "La actividad no existe";
        }
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
    <title>Borrado Actividad | Management Machado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
     <style>
     body {
            padding: 1em;
        }
     </style>   
  </head>
  <body>
    <h2> Borrado de actividades </h2>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="borrado">Introduce titulo actividad:</label>
        <input type="text" name="borrado">
        <button type="submit">Borrar actividad</button> <br>
    </form>
    <?php echo $result ?> <br> <br>
    <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>
</body>
</html>