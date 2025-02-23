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
    $page = $_GET['page-nr'] - 1;
    $start = $page * 5;
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

$todo=$titulo=$departamento=$trimestre=$estado="";

if (isset($_POST["csesion"])) {
session_destroy();
header("Location: inicio.php");
}

if (isset($_POST["1actividad"])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $departamento = $_POST['departamento'];
    $trimestre = $_POST['trimestre'];
    if (empty($titulo) || $departamento=="depart0"  || $trimestre=="0"){
        $estado = "Error: Todos los campos son obligatorios.";
    }
    $query = "SELECT * FROM actividad WHERE titulo='$titulo' AND id_departamento='$departamento' AND trimestre='$trimestre'";   
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0) {
        while($fila = mysqli_fetch_assoc($resultado)){
            
            $qtipo = "SELECT nombre FROM tipo_actividad WHERE id_tipo='$fila[id_tipo]'";
            $rtipo = mysqli_fetch_assoc(mysqli_query($enlace, $qtipo));
            $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$fila[id_departamento]'";
            $rdepartamento = mysqli_fetch_assoc(mysqli_query($enlace, $qdepartamento));
            // print_r($rdepartamento["nombre"]);
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
            $todo = 
              "<tr> <td>" . $fila["titulo"] . "</td>" . "<td> " . $rtipo["nombre"] . "</td>" .
                "<td>" . $rdepartamento["nombre"] . "</td>" . "<td>" . $allprofesor . "</td>" . 
                "<td>" . $fila["trimestre"] . "</td>" . "<td>" . $fila["fecha_inicio"] . "</td>" .
                "<td>" . $fila["fecha_fin"] . "</td>" . "<td>" . $fila["hora_inicio"] . "</td>" .
                "<td>" . $fila["hora_fin"] . "</td>" . "<td>" . $allorganizador . "</td>" . "<td>" . 
                $fila["acompanantes"] . "</td>" . "<td>" . $rubicacion["nombre"] . "</td>" . "<td>" . 
                $fila["coste"] . "</td>" . "<td>" . $fila["total_alumnos"] . "</td>" . 
                "<td>" . $fila["objetivo"] . "</td>" .  "<td>" . $fila["aprobada"] . "</td> </tr>";

        }}else{
            $estado = "No hubo resultados";
        }}
         
         if (isset($_POST["Tactividad"]) || isset($_GET['page-nr']) ) {
        //$orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
        
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
                $todo .= 
              "<tr> <td>" . $fila["titulo"] . "</td>" . "<td> " . $rtipo["nombre"] . "</td>" .
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
    }
         }

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
    <?php include('templates/index-css.php'); ?>
    
  </head>
  <body>

<div class="contenedor1">
    <h2> Bienvenido <?php echo $_SESSION['nombre'];  ?>  </h2>                      
    <span id="darkbutton">  <a href="index.php?toggle_dark_mode=true"> <button class="dark-mode-toggle"> <?php echo $_SESSION['dark_mode'] ? 'Cambiar a Modo Luz' : 'Cambiar a Modo Oscuro'; ?> </button> </a> </span>
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
 <form class="boton" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="titulo"> Introduce el titulo:</label>
        <input type="text" name="titulo"><br>
        <label for="tipo">Indique el tipo:</label>
        <label for="departamento">departamento:</label>
        <select name="departamento" id="departamento">
            <option selected value="0">Seleccione departa</option>
            <option value="1"> Lengua </option>
            <option value="2"> Matemáticas </option>
            <option value="3"> Educacion Física </option>
            <option value="4"> Informatica </option>
            <option value="5"> Física y Quimica </option>
        </select> <br>
        <label for="trimestre">trimestre:</label>
        <select name="trimestre">
            <option selected value="0"></option>
            <option value="1"> 1ºTrimestre </option>
            <option value="2"> 2ºTrimestre </option>
            <option value="3"> 3ºTrimestre </option>
        </select> <br> <br>
        <button type="submit" name="1actividad"> Buscar una actividad  </button> <button type="submit" name="Tactividad"> Buscar todas las actividades  </button>
        </form>        
        </div>
        <?php echo "<p>" . $estado . "</p>" ?> 
       <center> 
            <table style="width:60%">
                    <tr>
                        <td> <a class="head" href="index.php?columna=titulo&orden=<?php echo $order['titulo'] ?>"> Titulo </a></td>
                        <td> <a class="head" href="index.php?columna=tipo&orden=<?php echo $order['tipo'] ?>"> Tipo </a></td>
                        <td> <a class="head" href="index.php?columna=departamento&orden=<?php echo $order['departamento'] ?>"> Departamento </a></td>
                        <td> <a class="head" href="index.php?columna=Presponsable&orden=<?php echo $order['Presponsable'] ?>"> Profesor responsable </a></td>
                        <td> <a class="head" href="index.php?columna=trimestre&orden=<?php echo $order['trimestre'] ?>"> Trimestre </a></td>
                        <td> <a class="head" href="index.php?columna=Finicio&orden=<?php echo $order['Finicio'] ?>"> Fecha_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Ffin&orden=<?php echo $order['Ffin'] ?>"> Fecha_fin </a></td>
                        <td> <a class="head" href="index.php?columna=Hinicio&orden=<?php echo $order['Hinicio'] ?>"> Hora_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Hfin&orden=<?php echo $order['Hfin'] ?>"> Hora_fin </a></td>
                        <td> <a class="head" href="index.php?columna=organizador&orden=<?php echo $order['organizador'] ?>"> Organizador </a></td>
                        <td> <a class="head" href="index.php?columna=acompanantes&orden=<?php echo $order['acompanantes'] ?>"> Acompañantes </a></td>
                        <td> <a class="head" href="index.php?columna=ubicacion&orden=<?php echo $order['ubicacion'] ?>"> Ubicacion </a></td>
                        <td> <a class="head" href="index.php?columna=coste&orden=<?php echo $order['coste'] ?>"> Coste </a></td>
                        <td> <a class="head" href="index.php?columna=Talumnos&orden=<?php echo $order['Talumnos'] ?>"> Total alumnos </a></td>
                        <td> <a class="head" href="index.php?columna=objetivo&orden=<?php echo $order['objetivo'] ?>"> Objetivo </a></td> 
                        <td> <a class="head" href="index.php?columna=aprobada&orden=<?php echo $order['aprobada'] ?>"> Aprobada </a></td> 
                    </tr>
                    <?php echo $todo; ?>
            </table> 
        
        <div class="page-numbers">
            <?php
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
              <?php }} ?>
            
            

        </div>
        <div class="page-info">
            Enseñando 1 de <?php echo $pages ?> paginas
        </div>

 </center> <br> <br>

<script>
 function invalidar() {
alert("No tienes los privilegios necesarios para realizar la accion");

}
</script>
</body>
</html>