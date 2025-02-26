<?php
session_start(); 
if (!isset($_SESSION['sesion']) || $_SESSION['rol'] != "Administrador" ) { header("Location: inicio.php");}
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
	   $nombre = mysqli_fetch_assoc($resultado);
            mysqli_query($enlace, $query);
            $result = "Borrado realizado correctamente";
	$borrado_actividad = "La actividad " . $nombre["titulo"] . "  a las " . date("d-m-Y H:i:s") . 
			 " ha sido eliminada por el administrador " . $_SESSION['nombre'] . "\n";
                file_put_contents("eliminadas.txt", $borrado_actividad, FILE_APPEND);

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
       <link id="stylesheet" rel="stylesheet" href="templates/light.css">
     
    <style>
     #botonestilo{
            position: absolute;
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        body {
            padding: 1em;
        }
    </style>
  </head>
  <body>
    <h2> Borrado de actividades </h2>
    <button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="borrado">Introduce titulo actividad:</label>
        <input type="text" name="borrado">
        <button type="submit">Borrar actividad</button> <br>
    </form>
    <?php echo $result ?> <br> <br>
    <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>
</body>
</html>
