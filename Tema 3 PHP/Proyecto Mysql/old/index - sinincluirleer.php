<?php
session_start();
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");} //else { header("Location: inicio.php"); }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Pagina principal | Management Machado</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        a:hover{
            color:rgb(28, 134, 221);
        }
        a{
            color:black;
            text-decoration:none;
        }
        .secciones{
            font-family:verdana;
            out
        }
        .contenedor2 {
            max-width: 1170px; 
            margin-left: auto;
            margin-right: auto;
            padding: 1em;
        }
        ul {
            border: 2px solid lightgray;
            list-style: none; /* Elimino los puntos */

        }
    </style>
    
  </head>
  <body>

<div class="contendor1">
    <h2> Bienvenido <?php echo $_SESSION['nombre'];  ?>  </h2>
   <!-- <button onclick="window.location='crear.php';">Crear Nueva actividad</button> -->
</div>

<div class="contenedor2">
  <ul>
  
  <li><a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/actualiza.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?> > Actualizacion de actividades </a> </li>

<li><a class="secciones" href='http://alexguerrero.is-great.net/ProyectoMysql/leer.php' > Lectura de actividades </a> </li>
 
 <li><a class="secciones" href='http://alexguerrero.is-great.net/ProyectoMysql/leer.php' > Creación de actividades </a> </li>

  <li> <a class="secciones" <?php if ($_SESSION['rol'] != "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/borrado.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?>> Borrado de usuarios </a> </li>
  </ul>
</div>

--<script>
 function invalidar() {
alert("No tienes los privilegios necesarios para realizar la accion");

}
</script>
</body>
</html>