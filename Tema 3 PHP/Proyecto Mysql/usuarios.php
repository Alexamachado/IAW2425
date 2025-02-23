<?php
session_start(); 
if (!isset($_SESSION['sesion']) || $_SESSION['rol'] != "Administrador" ) { header("Location: inicio.php");}
include('templates/conexion.php');
 $showDivFlag=false;

$todo=$password="";

if (isset($_GET['email'])) {
    $correousuario = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['email'])));
    $id_usuario_actual = $_SESSION['id'];
     $queryfirst = "SELECT email, id FROM usuarios WHERE email='$correousuario'";
     $resultado = mysqli_query($enlace, $queryfirst);
          if (mysqli_num_rows($resultado) > 0){
              $fila = mysqli_fetch_assoc($resultado);
              $id_usuario = $fila["id"];
              $querydeleteactividad = "DELETE FROM actividad WHERE id_usuario='$id_usuario'"; 
              $querydeleteusuario = "DELETE FROM usuarios WHERE email='$correousuario'";
             mysqli_query($enlace, $querydeleteusuario);
              mysqli_query($enlace, $querydeleteactividad);
           echo "<script>alert('Se ha borrado exitosamente el usuario');</script>";
            if ($id_usuario_actual == $id_usuario ) {
                session_destroy();
                header("Location: inicio.php");
            }
        } else {
            echo "<script>alert('Ha habido un error, no modifiques la cabecera');</script>";
        }
    }

if (isset($_GET['econtrasena'])) {
    $econtrasena = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['econtrasena'])));
     $showDivFlag=true;
}
if (isset($_POST["actualizarcontrasena"])) {   
    $econtrasena = htmlspecialchars(trim($_POST['econtrasena']));
    $contrasena1 = htmlspecialchars(trim($_POST['contrasena1']));
    $contrasena2 = htmlspecialchars(trim($_POST['contrasena2']));
    if ($contrasena1 != $contrasena2 ){
        echo "<script>alert('Las contraseñas no coinciden');</script>";
    }else{
     $query = "UPDATE usuarios SET contrasena='$contrasena1' WHERE email='$econtrasena'";
     $resultado = mysqli_query($enlace, $query);
          if ($resultado){
            // mysqli_query($enlace, $query);
           echo "<script>alert('Se ha actualizado exitosamente la contraseña');</script>";
        } else {
            echo "<script>alert('Ha habido un error, no modifiques la cabecera');</script>";
        }}
    }

    

$query = "SELECT nombre, apellido, contrasena, email, Rol FROM usuarios";
$resultado = mysqli_query($enlace, $query);
$filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                foreach($filas as $fila){
$todo .=      "<tr> <td>" . $fila["nombre"] . "</td>" . "<td>" . $fila["apellido"] . "</td>" . 
              "<td>" . $fila["contrasena"] . "</td>" . "<td>" . $fila["email"] . "</td>" . 
              "<td> " . $fila["Rol"] .  "</td> <td> <button  onclick='if(confirm(\"¿Estas seguro de que deseas borrar el usuario?\")) window.location.href=\"?email=" . $fila["email"] . "\";'>Borrar</button>  </td> <td> <button onclick='window.location.href=\"?econtrasena=" . $fila["email"] . "\";'>Cambiar </button>  </td> </tr>"; 
        }
mysqli_close($enlace);
?>                          

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion usuarios | Management Machado</title>
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
                    <td> <a> Nombre </a></td>
                    <td> <a> Apellido </a></td>
                    <td> <a> Contraseña </a></td>
                    <td> <a> Correo electronico </a></td>
                    <td> <a> Rol </a></td>
                    <td> <a> Borrar </a></td>
                    <td> <a> Cambiar contraseña </a></td>
                    </tr>
                    <?php echo $todo; ?>
            </table> 
 </center>

<div <?php if ($showDivFlag===false){?> style="display:none" <?php } ?>>
    <form method="POST" action="usuarios.php">
        <input type="hidden" name="econtrasena" value="<?php echo $econtrasena; ?>">
        <label for="contrasena">Introduce la nueva contraseña:</label>
        <input type="text" name="contrasena1"><br>
        <label for="contrasena2">Repite la nueva contraseña:</label>
        <input type="text" name="contrasena2"><br>        
        <button type="submit" name="actualizarcontrasena">Actualizar contraseña</button>
    </form>
   
</div><br>


 <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>

<!--<script>
function bpassword(email) {
  let text = "¿Estas seguro de que deseas borrar el usuario?";
  if (confirm(text) == true) {
    <?php $querydelete = "DELETE FROM usuarios WHERE email='$correousuario'";
          mysqli_query($enlace, $querydelete);
         // $result = "Borrado realizado correctamente";
        //} else {
          // $result = "La actividad no existe";
         ?>
         alert("Se ha borrado la actividad exitosamente")
  }
}
</script>-->

</body>
</html>

 <!-- $todo .=      "<tr> <td>" . $fila["nombre"] . "</td>" . "<td>" . $fila["apellido"] . "</td>" . 
              "<td>" . $fila["contrasena"] . "</td>" . "<td>" . $fila["email"] . "</td>" . 
              "<td> " . $fila["Rol"] .  "</td> <td> <button type='button' onclick='if(confirm(\"¿Estas seguro de que deseas borrar el usuario?\")) window.location.href=\"?email=" . $fila["email"] . "\";'>Borrar</button> "/* . "<td> <button onclick='bpassword(" . $fila["email"] . ")'>Eliminar</button>"*/ . " </td> </tr>";  // <a href='delete.php?email=" .  $fila["email"] . "' onclick='return confirm(\"¿Estas seguro de que deseas borrar el usuario?\");'>Borrar</a>
              
              
              "<td> <a class='head' href='usuarios.php?email=" .  $fila["email"] . "&password=sdfsdf' onclick='return confirm(\"¿Estas seguro de que deseas borrar el usuario?\");'" . $fila["contrasena"] . "</td>"  -->