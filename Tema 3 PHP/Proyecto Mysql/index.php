<?php
session_start();
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");} //else { header("Location: inicio.php"); }
include('templates/conexion.php');
  
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
                "<td>" . $fila["objetivo"] . "</td> </tr>";

        }}else{
            $estado = "No hubo resultados";
        }}
         
         if (isset($_POST["Tactividad"])) {
        $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
            $query = "SELECT * FROM actividad";   
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
                "<td>" . $fila["objetivo"] . "</td> </tr>";
        }
    }else{
            $estado = "No hubo resultados";
    }
         }

            if (isset($_GET["columna"])) {
           $columna = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['columna'])));
           $orden = htmlspecialchars(trim(mysqli_real_escape_string($enlace, $_GET['orden'])));
           if ($columna == "titulo"){
               if ($orden == "ASC"){
                   $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden1 = "DESC";
                } else {
                     $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden1 = "ASC";}
                    $query = "SELECT * FROM actividad order by titulo ". $orden1;
                }
                else if ($columna == "tipo"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden2 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden2 = "ASC";}
                    $query = "SELECT A.* FROM actividad A, tipo_actividad T WHERE T.id_tipo=A.id_tipo order by nombre " . $orden2;
                }
                else if ($columna == "departamento"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden3 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden3 = "ASC";}
                    $query = "SELECT A.* FROM actividad A, departamento D WHERE D.id_departamento=A.id_departamento order by nombre " . $orden3;
                }
                else if ($columna == "Presponsable"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden4 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden4 = "ASC";}
                    $query = "SELECT A.* FROM actividad A, profesor_responsable PR WHERE PR.id_profesor_responsable=A.id_profesor_responsable order by nombre " . $orden4;
                }
                else if ($columna == "trimestre"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden5 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden5 = "ASC";}
                    $query = "SELECT * FROM actividad order by trimestre " . $orden5;
                }
                else if ($columna == "Finicio"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden6 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden6 = "ASC";}
                    $query = "SELECT * FROM actividad order by fecha_inicio " . $orden6;   
                }    
                else if ($columna == "Ffin"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden7 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden7 = "ASC";}
                    $query = "SELECT * FROM actividad order by fecha_fin " . $orden7;
                }
                else if ($columna == "Hinicio"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden8 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden8 = "ASC";}
                    $query = "SELECT * FROM actividad order by hora_inicio " . $orden8;
                }
                else if ($columna == "Hfin"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden9 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden9 = "ASC";}
                    $query = "SELECT * FROM actividad order by hora_fin " . $orden9;
                }
                else if ($columna == "organizador"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden10 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden10 = "ASC";}
                    $query = "SELECT A.* FROM actividad A, organizador O, profesor_responsable PR WHERE O.id_organizador=A.id_organizador AND PR.id_profesor_responsable=O.id_profesor_responsable  order by PR.nombre " . $orden10;
                }
                else if ($columna == "acompanantes"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden11 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden11 = "ASC";}
                    $query = "SELECT * FROM actividad order by acompanantes " . $orden11;
                }
                else if ($columna == "ubicacion"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden12 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden12 = "ASC";}
                    $query = "SELECT A.* FROM actividad A, ubicacion U WHERE U.id_ubicacion=A.id_ubicacion order by nombre " . $orden12;
                }
                else if ($columna == "coste"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden13 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden13 = "ASC";}
                    $query = "SELECT * FROM actividad order by coste " . $orden13;
                }
                else if ($columna == "Talumnos"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden14 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden14 = "ASC";}
                    $query = "SELECT * FROM actividad order by total_alumnos " . $orden14;
                }
                else if ($columna == "objetivo"){
                    if ($orden == "ASC"){
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                   $orden15 = "DESC";
                } else {
                    $orden1=$orden2=$orden3=$orden4=$orden5=$orden6=$orden7=$orden8=$orden9=$orden10=$orden11=$orden12=$orden13=$orden14=$orden15= "DESC";
                    $orden15 = "ASC";}
                    $query = "SELECT * FROM actividad order by objetivo " . $orden15;
                } else {
                die("Error: No modifiques las cabeceras.");
                }
            $resultado = mysqli_query($enlace, $query);
            $filas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
          foreach($filas as $fila){
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
                "<td>" . $fila["objetivo"] . "</td> </tr>";
        }
}
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
        }
        .contenedor1 { 
            padding: 1em;
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
        #cajatextarea{
            vertical-align: top;
        }
        .table, th, td {
            border:3px solid black;
            text-align: center; 
            width: 60%;
            height: 60%;
        }
        .head{
            color:darkblue;
            text-decoration: none;
        }
        .head:hover{
            color:blue;
            text-decoration: underline;
            cursor: pointer;
        }
        .boton {
            padding: 1em;
        }
        p {
             margin-left: 20px;
        }
    </style>
    
  </head>
  <body>

<div class="contenedor1">
    <h2> Bienvenido <?php echo $_SESSION['nombre'];  ?>  </h2>
   <!-- <button onclick="window.location='crear.php';">Crear Nueva actividad</button> -->
</div>

<div class="contenedor2">
  <ul>
  
  <li><a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/actualiza.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?> > Actualizacion de actividades </a> </li>
 
 <li><a class="secciones" href='http://alexguerrero.is-great.net/ProyectoMysql/crear.php' > Creación de actividades </a> </li>

  <li> <a class="secciones" <?php if ($_SESSION['rol'] == "Administrador"){ echo "href='http://alexguerrero.is-great.net/ProyectoMysql/borrado.php'"; } else { echo "onclick='invalidar()' href=''" ;} ?>> Borrado de actividades </a> </li>
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
                        <td> <a class="head" href="index.php?columna=titulo&orden=<?php echo $orden1 ?>"> Titulo </a></td>
                        <td> <a class="head" href="index.php?columna=tipo&orden=<?php echo $orden2 ?>"> Tipo </a></td>
                        <td> <a class="head" href="index.php?columna=departamento&orden=<?php echo $orden3 ?>"> Departamento </a></td>
                        <td> <a class="head" href="index.php?columna=Presponsable&orden=<?php echo $orden4 ?>"> Profesor responsable </a></td>
                        <td> <a class="head" href="index.php?columna=trimestre&orden=<?php echo $orden5 ?>"> Trimestre </a></td>
                        <td> <a class="head" href="index.php?columna=Finicio&orden=<?php echo $orden6 ?>"> Fecha_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Ffin&orden=<?php echo $orden7 ?>"> Fecha_fin </a></td>
                        <td> <a class="head" href="index.php?columna=Hinicio&orden=<?php echo $orden8 ?>"> Hora_inicio </a></td>
                        <td> <a class="head" href="index.php?columna=Hfin&orden=<?php echo $orden9 ?>"> Hora_fin </a></td>
                        <td> <a class="head" href="index.php?columna=organizador&orden=<?php echo $orden10 ?>"> Organizador </a></td>
                        <td> <a class="head" href="index.php?columna=acompanantes&orden=<?php echo $orden11 ?>"> Acompañantes </a></td>
                        <td> <a class="head" href="index.php?columna=ubicacion&orden=<?php echo $orden12 ?>"> Ubicacion </a></td>
                        <td> <a class="head" href="index.php?columna=coste&orden=<?php echo $orden13 ?>"> Coste </a></td>
                        <td> <a class="head" href="index.php?columna=Talumnos&orden=<?php echo $orden14 ?>"> Total alumnos </a></td>
                        <td> <a class="head" href="index.php?columna=objetivo&orden=<?php echo $orden15 ?>"> Objetivo </a></td> 
                    </tr>
                    <?php echo $todo; ?>
            </table> 
 </center> <br> <br>

<script>
 function invalidar() {
alert("No tienes los privilegios necesarios para realizar la accion");

}
</script>
</body>
</html>