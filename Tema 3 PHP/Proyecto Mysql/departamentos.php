<?php
session_start(); 
if (!isset($_SESSION['sesion']) || $_SESSION['rol'] != "Administrador" ) { header("Location: inicio.php");}
include('templates/conexion.php');
$showNuevoNombre=false;
$showCrearDepartamento=false;

$todo="";

//Borrado departamento
if (isset($_GET['bdepartamento'])) {
    $id_departamento = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['bdepartamento'])));
     $queryiddepartamento = "SELECT id_departamento FROM departamento WHERE id_departamento='$id_departamento'";
     $resultado = mysqli_query($enlace, $queryiddepartamento);
         if (mysqli_num_rows($resultado) > 0){
              $querydeletedepartamento = "DELETE FROM departamento WHERE id_departamento='$id_departamento'"; 
              $querydeleteactividad = "DELETE FROM actividad WHERE id_departamento='$id_departamento'";
             mysqli_query($enlace, $querydeletedepartamento);
              mysqli_query($enlace, $querydeleteactividad);
           echo "<script>alert('Se ha borrado exitosamente el departamento');</script>";
        } else {
            echo "<script>alert('Ha habido un error, no modifiques la cabecera');</script>";
        }
    }

//Actualizar nombre departamento
if (isset($_GET['cdepartamento'])) {
    $cdepartamento = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['cdepartamento'])));
    $showNuevoNombre=true;
}
if (isset($_POST["actualizardepartamento"])) {   
    $id_departamento = htmlspecialchars(trim($_POST['id_departamento']));
    $nombredepartamento = htmlspecialchars(trim($_POST['rdepartamento']));
     $query = "UPDATE departamento SET nombre='$nombredepartamento' WHERE id_departamento='$id_departamento'";
     $resultado = mysqli_query($enlace, $query);
     //hay que hacer un select del id
          if ($resultado){
           echo "<script>alert('Se ha actualizado exitosamente el departamento');</script>";
        } else {
            echo "<script>alert('Ha habido un error, no modifiques la cabecera');</script>";
        }
    }

//Añadir nuevo departamento
if (isset($_GET['ndepartamento'])) {
    //$ndepartamento = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['ndepartamento'])));
    $showCrearDepartamento=true;
}
if (isset($_POST["nuevodepartamento"])) {   
    $nombredepartamento = htmlspecialchars(trim($_POST['nombredepartamentoanadir']));
    $queryiddepartamento = "SELECT id_departamento FROM departamento order by id_departamento DESC";
     $resultadoid = mysqli_fetch_assoc(mysqli_query($enlace, $queryiddepartamento));
    $iddepartamento = $resultadoid["id_departamento"]+1;
     $query = "INSERT INTO departamento (id_departamento, nombre ) VALUES ('$iddepartamento', '$nombredepartamento')";
     $resultado = mysqli_query($enlace, $query);
     //hay que hacer un select del id
          if ($resultado){
            // mysqli_query($enlace, $query);
           echo "<script>alert('Se ha creado exitosamente la nueva actividad');</script>";
        } else {
            echo "<script>alert('Ha habido un error, no modifiques la cabecera');</script>";
        }
    }

$query = "SELECT id_departamento, nombre FROM departamento";
$resultado = mysqli_query($enlace, $query);
$filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                foreach($filas as $fila){
$todo .=      "<tr> <td>" . $fila["nombre"] . " <td> <button style='width:100%'  onclick='if(confirm(\"¿Estas seguro de que deseas borrar el departamento?\")) window.location.href=\"?bdepartamento=" . $fila["id_departamento"] . "\";'>Borrar</button>  </td> <td> <button style='width:100%'  onclick='window.location.href=\"?cdepartamento=" . $fila["id_departamento"] . "\";'>Cambiar </button>  </td> </tr>"; 
        }
$todo .= "<tr> <td colspan='3'> <button style='width:55%'  onclick='window.location.href=\"?ndepartamento=aaa\";'>Añadir nuevo departamento </button></td> </tr>";
mysqli_close($enlace);
?>                          

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion Departamentos | Management Machado</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
          .table, th, td {
            border:3px solid black;
            text-align: center; 
            width: 10%;
            height: 60%;
        }
        body {
            padding: 1em;
        }
        </style>
  </head>
  <body>
  <button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script>
   <center> 
        <table style="width:60%">
                <tr>
                    <td> <a> Nombre departamento </a></td>
                    <td> <a> Borrar </a></td>
                    <td> <a> Cambiar nombre </a></td>
                    </tr>
                    <?php echo $todo; ?>
            </table> 
 </center> <br>

 <div <?php if ($showNuevoNombre===false){?> style="display:none" <?php } ?>>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id_departamento" value="<?php echo $cdepartamento; ?>"> 
        <label for="contrasena">Introduce un nuevo nombre para el departamento:</label>
        <input type="text" name="rdepartamento"><br>
        <button type="submit" name="actualizardepartamento">Actualizar nombre departamento</button>
    </form>   
</div><br> 

<div <?php if ($showCrearDepartamento===false){?> style="display:none" <?php } ?>>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>"> 
        <label for="nombredepartamentoanadir">Introduce el nombre del departamento a añadir:</label>
        <input type="text" name="nombredepartamentoanadir"><br>
        <button type="submit" name="nuevodepartamento">Añadir departamento</button>
</form>
</div><br> 

 <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>



</body>
</html>