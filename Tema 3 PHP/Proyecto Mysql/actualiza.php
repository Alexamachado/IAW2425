<?php
session_start(); 
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");}
include('templates/conexion.php');
 $showDivFlag=false;
 $actualizacion=$accion="";
 $Bactividad;

if (isset($_POST["buscaractividad"])) {
    $Bactividad = htmlspecialchars(trim($_POST['Bactividad']));
    $query = "SELECT titulo FROM actividad WHERE titulo='$Bactividad'";
    $resultado = mysqli_query($enlace, $query);

    if (mysqli_num_rows($resultado) < 1) {
        $accion = "<p>Error: No existe ninguna actividad que se llame asi.</p>";
    }
    else{
         $_SESSION['bactividad'] = "$Bactividad";
    $showDivFlag=true;
     $query = "SELECT * FROM actividad WHERE titulo='$Bactividad'";
    $resultado = mysqli_query($enlace, $query);
    while($fila = mysqli_fetch_assoc($resultado)){
            /*$qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$fila[id_departamento]'";
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
            $rubicacion = mysqli_fetch_assoc(mysqli_query($enlace, $qubicacion));*/

            $btitulo = $fila["titulo"];
            $btipo = $fila["id_tipo"];
            $bdepartamento = $fila["id_departamento"];
            $bprofesor = $fila["id_profesor_responsable"];
            $btrimestre = $fila["trimestre"];
            $bfinicio = $fila["fecha_inicio"];
            $bffin = $fila["fecha_fin"];
            $bhinicio = $fila["hora_inicio"];
            $bhfin = $fila["hora_fin"];
            $borganizador = $fila["id_organizador"];
            $bacompanantes = $fila["acompanantes"];
            $bubicacion = $fila["id_ubicacion"];
            $bcoste = $fila["coste"];
            $btalumnos = $fila["total_alumnos"];
            $bobjetivo = $fila["objetivo"];
        }

    }
}
    

if (isset($_POST["actualizaractividad"])) {    
    // $showDivFlag=true;
    $Bactividad = $_SESSION['bactividad'];
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $tipo = $_POST['tipo'];
    $departamento = $_POST['departamento'];
    $profesor = $_POST['profesor'];
    $trimestre = $_POST['trimestre'];
    $fecha_inicio = htmlspecialchars(trim($_POST['fecha_inicio']));
    $fecha_fin = htmlspecialchars(trim($_POST['fecha_fin']));
    $hora_inicio =$_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $organizador = $_POST['organizador'];
    $acompanantes = htmlspecialchars(trim($_POST['acompanantes']));
    $ubicacion = $_POST['ubicacion'];
    $coste = htmlspecialchars(trim($_POST['coste']));
    $Talumnos = htmlspecialchars(trim($_POST['Talumnos']));
    $objetivo = htmlspecialchars(trim($_POST['objetivo']));
     $date1 = date_create_from_format('d/m/Y', $fecha_inicio);
    $date2 = date_create_from_format('d/m/Y', $fecha_fin);
     if ($date1 > $date2){
            $actualizacion = "Las fechas estan mal introducidas"; 
        } else {
    $query = "UPDATE actividad SET titulo='$titulo', id_tipo='$tipo', id_departamento='$departamento', id_profesor_responsable='$profesor', trimestre='$trimestre', fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', hora_fin='$hora_fin', id_organizador='$organizador', acompanantes='$acompanantes', id_ubicacion='$ubicacion', coste='$coste', total_alumnos='$Talumnos', objetivo='$objetivo' WHERE titulo='$Bactividad'";
            $resultado = mysqli_query($enlace, $query);
            if ($resultado) {
                $actualizacion = "Actividad Actualizada exitosamente";
            } else {
                $actualizacion = "Error al actualizar la actividad";
            }}
        mysqli_close($enlace);
}
        ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Actualizacion actividad | Management Machado</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        #cajatextarea{
            vertical-align: top;
        }
        body {
            padding: 1em;
        }
    </style>
  </head>
  <body>
<h2> Actualización de actividades </h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="">Introduce la actividad a modificar</label>
<input type="text" name="Bactividad">
 <button type="submit" name="buscaractividad"> Buscar una actividad  </button>
</form>
<br>
<?php echo $accion ?>
 <?php echo $actualizacion ?> <br>

<div <?php if ($showDivFlag===false){?> style="display:none" <?php } ?>>
    <form method="POST" action="actualiza.php">
        <label for="titulo">titulo:</label>
        <input type="text" value="<?php echo $btitulo ?>" name="titulo"><br>
        <label for="tipo">tipo:</label>
        <select name="tipo" value="<?php echo $btipo ?>">
            <option value="1" > extraescolar </option>
            <option value="2" > complementaria </option>
        </select> <br>
        <label for="departamento">departamento:</label>
        <select name="departamento" id="departamento" >
        <option value="1" <?php if ($bdepartamento == 1) echo 'selected'; ?>> Lengua </option>
        <option value="2" <?php if ($bdepartamento == 2) echo 'selected'; ?>> Matemáticas </option>
        <option value="3" <?php if ($bdepartamento == 3) echo 'selected'; ?>> Educacion Física </option>
        <option value="4" <?php if ($bdepartamento == 4) echo 'selected'; ?>> Informatica </option>
        <option value="5" <?php if ($bdepartamento == 5) echo 'selected'; ?>> Física y Quimica </option>
        </select> <br>
        <label for="profesor">Profesor responsable:</label>  
        <select name="profesor" id="profesor" value="<?php echo $bprofesor ?>">
        </select> <br>
        <label for="trimestre">trimestre:</label>
        <select name="trimestre">
            <option value="1" <?php if ($btrimestre == 1) echo 'selected'; ?>> 1ºTrimestre </option>
            <option value="2" <?php if ($btrimestre == 2) echo 'selected'; ?>> 2ºTrimestre </option>
            <option value="3" <?php if ($btrimestre == 3) echo 'selected'; ?>> 3ºTrimestre </option>
        </select> <br>
        <label for="fecha_inicio">fecha_inicio:</label>
        <input id="fecha_inicio" name="fecha_inicio" readonly='true' value="<?php echo $bfinicio ?>"><br>
        <label for="fecha_fin">fecha_fin:</label>
        <input id="fecha_fin" name="fecha_fin" readonly='true' value="<?php echo $bffin ?>"><br>
         <label for="hora_inicio">hora_inicio:</label>
        <select name="hora_inicio" id="hora_inicio">
            <option value="15:30" <?php if ($bhinicio == "15:30") echo 'selected'; ?>> 15:30 </option>
            <option value="16:30" <?php if ($bhinicio == "16:30") echo 'selected'; ?>> 16:30 </option>
            <option value="17:30" <?php if ($bhinicio == "17:30") echo 'selected'; ?>> 17:30 </option>
            <option value="18:15" <?php if ($bhinicio == "18:15") echo 'selected'; ?>> 18:15 </option>
        </select> <br>
        <label for="hora_fin">hora_fin:</label>
        <select name="hora_fin" id="hora_fin">
        </select> <br>
        <label for="organizador">organizador:</label>
         <select name="organizador" id="organizador" value="<?php echo $borganizador ?>">
        </select> <br>
        <label for="acompanantes" id="cajaacompanantes">acompañantes:</label>
        <textarea name="acompanantes"> <?php echo $bacompanantes ?></textarea><br>
        <label for="ubicacion">ubicacion:</label>
        <select name="ubicacion" value="<?php echo $bubicacion ?>">
            <option value="1" <?php if ($bubicacion == 1) echo 'selected'; ?>> Gimnasio </option>
            <option value="2" <?php if ($bubicacion == 2) echo 'selected'; ?>> Aula informatica </option>
            <option value="3" <?php if ($bubicacion == 3) echo 'selected'; ?>> Aula 104 </option>
            <option value="4" <?php if ($bubicacion == 4) echo 'selected'; ?>> Biblioteca </option>
        </select> <br>
        <label for="coste">Coste:</label>
        <input type="number" name="coste" value="<?php echo $bcoste ?>"><br>
        <label for="Talumnos">Total alumnos:</label>
        <input type="number" name="Talumnos" value="<?php echo $btalumnos ?>"><br>
        <label for="objetivo" id="cajatextarea">Objetivo:</label>
        <textarea name="objetivo"> <?php echo $bobjetivo ?></textarea><br>
        <button type="submit" name="actualizaractividad">Actualizar actividad</button>
    </form>
   
</div><br>

 <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>

     <?php if ($showDivFlag===true){?> 
    <script>
      $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                weekHeader: 'Sm',
                dateFormat: "dd/mm/yy", //"DD dd 'de' MM",
                firstDay: 1,
                isRTL: false,
                minDate: "+1D", maxDate: "+3M",
                showMonthAfterYear: false,
                yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
         //$(document).ready(function () {
        $("#fecha_inicio").datepicker()
        $("#fecha_fin").datepicker()

        var hora = $("#hora_inicio").val();
         actualizarhora(hora); 
         
           function actualizarhora(hora) {
                if (hora == "15:30") {
            $("#hora_fin").html("<option value='16:15' <?php if ($bhfin == '16:15') echo 'selected'; ?>>16:15</option> <option value='17:15' <?php if ($bhfin == '17:15') echo 'selected'; ?>>17:15</option>");
        } else if (hora == "16:30") {
             $("#hora_fin").html(" <option value='17:15' <?php if ($bhfin == '17:15') echo 'selected'; ?>>17:15</option><option value='18:45' <?php if ($bhfin == '18:45') echo 'selected'; ?>>18:45</option>");
        } else if (hora == "17:30") {
             $("#hora_fin").html(" <option value='18:45' <?php if ($bhfin == '18:45') echo 'selected'; ?>>18:45</option><option value='19:15' <?php if ($bhfin == '19:15') echo 'selected'; ?>>19:15</option>");
        } else if (hora == "18:15") {
             $("#hora_fin").html("<option value='19:15'>19:15</option>");
        }};
            // Actualizamos las opciones cuando la hora cambia
        $("#hora_inicio").change(function () {
            var hora = $("#hora_inicio").val();
            actualizarhora(hora);
             });
        
         var valor = $("#departamento").val(); //var valor = $("#departamento").attr("value");
         actualizardepart(valor);

      function actualizardepart(valor) {
                if (valor == "1") {
            $("#profesor").html(" <option value='1' <?php if ($bprofesor == 1) echo 'selected'; ?>>Francisco Javier Garcia</option> <option value='2' <?php if ($bprofesor == 2) echo 'selected'; ?>>Rocio Macgire</option> <option value='3' <?php if ($bprofesor == 3) echo 'selected'; ?>>Mariano Gimenez Santi</option>");
             $("#organizador").html("<option value='1'>Francisco Javier Garcia</option>");
        } else if (valor == "2") {
             $("#profesor").html("<option value='4' <?php if ($bprofesor == 4) echo 'selected'; ?>>Mario Barbaroja</option><option value='5' <?php if ($bprofesor == 5) echo 'selected'; ?>>Gloria Buenafuentes</option>");
             $("#organizador").html("<option value='2'>Mario Barbaroja</option>");
        } else if (valor == "3") {
             $("#profesor").html("<option value='6' <?php if ($bprofesor == 6) echo 'selected'; ?>>Carlos Manuel Vivagua</option><option value='7' <?php if ($bprofesor == 7) echo 'selected'; ?>>John Comepiedras</option>");
             $("#organizador").html("<option value='1'>Carlos Manuel Vivagua</option>");
        } else if (valor == "4") {
             $("#profesor").html(" <option value='8' <?php if ($bprofesor == 8) echo 'selected'; ?>>Maria Fuentes Ortiz</option><option value='9' <?php if ($bprofesor == 9) echo 'selected'; ?>>Isabel Ruiz Pilar</option><option value='10' <?php if ($bprofesor == 10) echo 'selected'; ?>>Juan Dominguez Buenaventura</option>");
             $("#organizador").html(" <option value='3' <?php if ($borganizador == 3 ) echo 'selected'; ?>>Maria Fuentes Ortiz</option><option value='4' <?php if ($borganizador == 4) echo 'selected'; ?>>Isabel Ruiz Pilar</option>");
        } else if (valor == "5") {
             $("#profesor").html("<option value='11' <?php if ($bprofesor == 11) echo 'selected'; ?>>Luz Benites Torres</option><option value='12' <?php if ($bprofesor == 12) echo 'selected'; ?>>Bernat Dacosta</option>");
             $("#organizador").html("<option value='5'>Luz Benites Torres</option>");
    }};
        // Actualizamos las opciones cuando el departamento cambia
        $("#departamento").change(function () {
            var valor = $("#departamento").val();
            actualizardepart(valor);
             });
    //});
    </script>
    <?php } ?>

</body>
</html>

  