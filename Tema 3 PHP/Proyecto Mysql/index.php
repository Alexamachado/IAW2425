<?php
session_start();
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");} //else { header("Location: inicio.php"); }
include('templates/conexion.php');

//Obtener numero de actividades
$Pquery = "SELECT * FROM actividad";   
$Presultado = mysqli_query($enlace, $Pquery);
$Pnumero = mysqli_num_rows($Presultado);
//Calcular numero de paginas
$pages = ceil($Pnumero / 5);

$start = "0";
if(isset($_GET['page-nr'])){
    if ($_GET['page-nr'] == 1){ 
        $page = 1;
    } else {
    $page = $_GET['page-nr'];
   $start = ($page - 1) * 5;
    echo $start;
    }
} else {
    $page = 1;
}


//Actividades aprobadas
$queryaprobada = "SELECT aprobada FROM actividad";   
    $resultadoaprobada = mysqli_query($enlace, $queryaprobada);
    if (mysqli_num_rows($resultadoaprobada) > 0) {
        //while($fila = mysqli_fetch_assoc($resultado)){
        $totalaprobadas = mysqli_num_rows($resultadoaprobada);
        $querysiaprobada = "SELECT aprobada FROM actividad where aprobada='Si'";   
        $resultadosiaprobada = mysqli_query($enlace, $querysiaprobada);
        $siaprobadas = mysqli_num_rows($resultadosiaprobada);
        $querynoaprobada = "SELECT aprobada FROM actividad where aprobada='No'";   
        $resultadonoaprobada = mysqli_query($enlace, $querynoaprobada);
        $noaprobadas = mysqli_num_rows($resultadonoaprobada);
    }else{
            $totalaprobadas=$noaprobadas=$siaprobadas="";
    }

   //Obtener ultima sesion     else { $_SESSION['ultimasesion'] = "" }
   if (isset($_SESSION['ultimasesion'])){
   $sesion = "se conecto por ultima vez el " . $_SESSION['ultimasesion'];
   } else {$sesion = "es la primera vez que se conecta";}
   //$last = "SELECT ultimasesion from usuarios WHERE email='$sesionemail'";  
   // $ultimasesion = mysqli_fetch_assoc(mysqli_query($enlace, $last));

$todo=$titulo=$departamento=$trimestre=$estado="";

if (isset($_POST["csesion"])) {
session_destroy();
header("Location: inicio.php");
}

if (!isset($_GET["columna"])) {      
    $query = "SELECT * FROM actividad LIMIT $start, 5";   
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    foreach($filas as $fila){
           // $id = $fila["id"]
           // for($i=0;$i<$id;$i++)
    $qtipo = "SELECT nombre FROM tipo_actividad WHERE id_tipo='$fila[id_tipo]'";
    $rtipo = mysqli_fetch_assoc(mysqli_query($enlace, $qtipo));
    $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$fila[id_departamento]'";
    $rdepartamento = mysqli_fetch_assoc(mysqli_query($enlace, $qdepartamento));
    $qprofesor = "SELECT nombre, apellidos  FROM profesor_responsable WHERE id_profesor_responsable='$fila[id_profesor_responsable]'";
    $rprofesor = mysqli_fetch_assoc(mysqli_query($enlace, $qprofesor));
    $allprofesor = $rprofesor["nombre"] . " " . $rprofesor["apellidos"];
    $porganizador = "SELECT id_profesor_responsable FROM organizador WHERE id_organizador='$fila[id_organizador]'";
    $sorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $porganizador)); 
    $qorganizador = "SELECT nombre, apellidos FROM profesor_responsable WHERE id_profesor_responsable='$sorganizador[id_profesor_responsable]'";
    $rorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $qorganizador));
    $allorganizador = $rorganizador["nombre"] . " " . $rorganizador["apellidos"];
    $qubicacion = "SELECT nombre FROM ubicacion WHERE id_ubicacion='$fila[id_ubicacion]'";
    $rubicacion = mysqli_fetch_assoc(mysqli_query($enlace, $qubicacion));
    $todo .= "<tr> <td>" . $fila["titulo"] . "</td>" . "<td> " . $rtipo["nombre"] . "</td>" .
                "<td>" . $rdepartamento["nombre"] . "</td>" . "<td>" . $allprofesor . "</td>" . 
                "<td>" . $fila["trimestre"] . "</td>" . "<td>" . $fila["fecha_inicio"] . "</td>" .
                "<td>" . $fila["fecha_fin"] . "</td>" . "<td>" . $fila["hora_inicio"] . "</td>" .
                "<td>" . $fila["hora_fin"] . "</td>" . "<td>" . $allorganizador . "</td>" . "<td>" . 
                $fila["acompanantes"] . "</td>" . "<td>" . $rubicacion["nombre"] . "</td>" . "<td>" . 
                $fila["coste"] . "</td>" . "<td>" . $fila["total_alumnos"] . "</td>" . 
                "<td>" . $fila["objetivo"] . "</td>" .  "<td>" . $fila["aprobada"] . "</td> </tr>";
        }
    }else{
            $estado = "No hubo resultados";
    }}
         
          $order = [
        "titulo" => "DESC",
        "tipo" => "DESC",
        "departamento" => "DESC",
        "Presponsable" => "DESC",
        "trimestre" => "DESC",
        "Finicio" => "DESC",
        "Ffin" => "DESC",
        "Hinicio" => "DESC",
        "Hfin" => "DESC",
        "organizador" => "DESC",
        "acompanantes" => "DESC",
        "ubicacion" => "DESC",
        "coste" => "DESC",
        "Talumnos" => "DESC",
        "objetivo" => "DESC",
        "aprobada" => "DESC"
    ];

include('templates/index-sortcolumna.php');

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pagina principal | Management Machado</title>
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
        </style>
  </head>
  <body>

<div class="contenedor1">
    <h2> Bienvenido <?php echo $_SESSION['nombre'];  ?>,  <?php echo $sesion  ?> desde la dirección IP <?php echo $_SERVER['REMOTE_ADDR']  ?>. </h2>                      
    <!-- <span id="darkbutton">  <a href="index.php?toggle_dark_mode=true"> <button class="dark-mode-toggle"> <?php echo $_SESSION['dark_mode'] ? 'Cambiar a Modo Luz' : 'Cambiar a Modo Oscuro'; ?> </button> </a> </span> -->
      <button id="botonestilo">Modo oscuro</button>
      <script src="cambiomodo.js"></script>
    <!--<h3> se conecto por ultima vez el  </h3>-->
    <div> &nbsp; &nbsp;  Total de actividades propuestas: <?php echo $totalaprobadas;  ?> </div>
    <div> &nbsp; &nbsp; Total de actividades aprobadas: <?php echo $siaprobadas;  ?> </div>
    <div> &nbsp; &nbsp; Total de actividades pendientes de aprobación: <?php echo $noaprobadas;  ?> </div>
   <!-- <button onclick="window.location='crear.php';">Crear Nueva actividad</button> -->
</div>



<div class="contenedor2">
  <ul>

    <li><a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/usuarios.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?> > Gestión de usuarios </a> </li>

    <li><a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/departamentos.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?> > Gestión de departamentos </a> </li>

  <li><a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/actualiza.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?> > Actualizacion de actividades </a> </li>
 
 <li><a class="secciones" href='http://alexguerrero.is-great.net/ProyectoMysql/crear.php' > Creación de actividades </a> </li>

  <li> <a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/borrado.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?>> Borrado de actividades </a> </li>

  <li><a class="secciones" href='http://alexguerrero.is-great.net/ProyectoMysql/estadisticas.php' > Estadísticas </a> </li>
  </ul>
    <form form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <button type="submit" name="csesion">Cerrar sesion</button>
    </form> 
</div>

<div class="contenedor3">
<center> <h2>Lectura Actividades</h2> </center>
</div>
        <?php echo "<p>" . $estado . "</p>" ?> 
       <center> 
            <table style="width:60%">
                    <tr>
                        <td> <a class="head" href="index.php?columna=titulo&orden=<?php echo $order['titulo'] ?>&page-nr=<?php echo $page; ?>"> Titulo </a></td>
                        <td> <a class="head" href="index.php?columna=tipo&orden=<?php echo $order['tipo'] ?>&page-nr=<?php echo $page; ?>"> Tipo </a></td>
                        <td> <a class="head" href="index.php?columna=departamento&orden=<?php echo $order['departamento'] ?>&page-nr=<?php echo $page; ?> "> Departamento </a></td>
                        <td> <a class="head" href="index.php?columna=Presponsable&orden=<?php echo $order['Presponsable'] ?>&page-nr=<?php echo $page; ?>"> Profesor responsable </a></td>
                        <td> <a class="head" href="index.php?columna=trimestre&orden=<?php echo $order['trimestre'] ?>&page-nr=<?php echo $page; ?>"> Trimestre </a></td>
                        <td> <a class="head" href="index.php?columna=Finicio&orden=<?php echo $order['Finicio'] ?>&page-nr=<?php echo $page; ?>"> Fecha_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Ffin&orden=<?php echo $order['Ffin'] ?>&page-nr=<?php echo $page; ?>"> Fecha_fin </a></td>
                        <td> <a class="head" href="index.php?columna=Hinicio&orden=<?php echo $order['Hinicio'] ?>&page-nr=<?php echo $page; ?>"> Hora_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Hfin&orden=<?php echo $order['Hfin'] ?>&page-nr=<?php echo $page; ?>"> Hora_fin </a></td>
                        <td> <a class="head" href="index.php?columna=organizador&orden=<?php echo $order['organizador'] ?>&page-nr=<?php echo $page; ?>"> Organizador </a></td>
                        <td> <a class="head" href="index.php?columna=acompanantes&orden=<?php echo $order['acompanantes'] ?>&page-nr=<?php echo $page; ?>"> Acompañantes </a></td>
                        <td> <a class="head" href="index.php?columna=ubicacion&orden=<?php echo $order['ubicacion'] ?>&page-nr=<?php echo $page; ?>"> Ubicacion </a></td>
                        <td> <a class="head" href="index.php?columna=coste&orden=<?php echo $order['coste'] ?>&page-nr=<?php echo $page; ?>"> Coste </a></td>
                        <td> <a class="head" href="index.php?columna=Talumnos&orden=<?php echo $order['Talumnos'] ?>&page-nr=<?php echo $page; ?>"> Total alumnos </a></td>
                        <td> <a class="head" href="index.php?columna=objetivo&orden=<?php echo $order['objetivo'] ?>&page-nr=<?php echo $page; ?>"> Objetivo </a></td> 
                        <td> <a class="head" href="index.php?columna=aprobada&orden=<?php echo $order['aprobada'] ?>&page-nr=<?php echo $page; ?>"> Aprobada </a></td> 
                    </tr>
                    <?php echo $todo; ?>
            </table> 
        
        <div class="page-numbers">
            <!-- <?php
               if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){ ?>
                <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Anterior </a>
               <?php }else{ ?>
                    <a>Anterior</a>
               <?php } ?>

             &nbsp; <?php
                for($contador = 1; $contador <= $pages; $contador++){?>
                    <a href="?page-nr=<?php echo $contador ?>"><?php echo $contador ?></a>
                <?php } ?> &nbsp;
                
                <?php
            if(!isset($_GET['page-nr'])){ ?>
                <a href="?page-nr=2">Siguiente</a>
               <?php }else{
                    if($_GET['page-nr'] >= $pages){ ?>
                    <a>Siguiente</a>
               <?php }else{ ?>
                    <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>"> Siguiente</a>
              <?php }} ?> -->
            
             <?php if ($page > 1){ 
                 if (isset($_GET["columna"])) {?>
            <a href="index.php?columna=<?php echo $columna; ?>&orden=<?php echo $orden; ?>&page-nr=<?php echo $page - 1; ?>">Página Anterior</a>
        <?php }else{ ?>
            <a href="index.php?page-nr=<?php echo $page - 1; ?>">Página Anterior</a>
        <?php }} ?>
        <?php if ($page < $pages){ 
            if (isset($_GET["columna"])) { ?>
            <a href="index.php?columna=<?php echo $columna; ?>&orden=<?php echo $orden; ?>&page-nr=<?php echo $page + 1; ?>">Página Siguiente</a>
        <?php }else{ ?>
            <a href="index.php?page-nr=<?php echo $page + 1; ?>">Página Siguiente</a>
        <?php }} ?>
            
            

        </div>
        <div class="page-info">
            Enseñando <?php echo $page  ?> de <?php echo $pages ?> paginas
        </div>

 </center> <br> <br>

<script>
 function invalidar() {
alert("No tienes los privilegios necesarios para realizar la accion");

}
</script>
</body>
</html>


<!-- 
 <div>
         Enlaces de Paginación 
        <?php if ($page > 1): ?>
            <a href="index.php?page-nr=<?php echo $page - 1; ?>&columna=<?php echo $columna; ?>&orden=<?php echo $orden; ?>">Página Anterior</a>
        <?php endif; ?>

        <?php if ($page < $total_paginas): ?>
            <a href="index.php?page-nr=<?php echo $page + 1; ?>&columna=<?php echo $columna; ?>&orden=<?php echo $orden; ?>">Página Siguiente</a>
        <?php endif; ?>
    </div>
-->