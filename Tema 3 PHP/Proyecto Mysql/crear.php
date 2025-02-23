<?php
session_start(); 
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");}
include('templates/conexion.php');

$estado=$tipo=$departamento=$profesor=$trimestre=$hora_inicio=$hora_fin=$organizador=$ubicacion=$sdepartamento="";

$querydepartamento = "SELECT id_departamento, nombre FROM departamento;";   
$resultadodepartamento = mysqli_query($enlace, $querydepartamento);
$opciones = mysqli_fetch_all($resultadodepartamento, MYSQLI_ASSOC);
foreach($opciones as $opcion){               
    //$qtipo = "SELECT nombre FROM tipo_actividad WHERE id_tipo='$fila[id_tipo]'";
    //$rtipo = mysqli_fetch_assoc(mysqli_query($enlace, $qtipo));
    $sdepartamento .= " <option value=" . $opcion['id_departamento'] .">" . $opcion['nombre'] . "</option>";
}

$estado=$tipo=$departamento=$profesor=$trimestre=$hora_inicio=$hora_fin=$organizador=$ubicacion="";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    $idusuario = $_SESSION['id'];
    $coste = htmlspecialchars(trim($_POST['coste']));
    $Talumnos = htmlspecialchars(trim($_POST['Talumnos']));
    $objetivo = htmlspecialchars(trim($_POST['objetivo']));

    if (empty($titulo) || $tipo == "0" || $departamento == "0" || $profesor == "0" || empty($trimestre)
       || empty($fecha_inicio) || empty($fecha_fin) || empty($hora_inicio) || empty($hora_fin)
       || $organizador == "0" || empty($acompanantes) || $ubicacion == "0" || empty($coste) 
       || empty($Talumnos) || empty($objetivo)) {
        $estado = "Error: Todos los campos son obligatorios.";
    } else {
        $date1 = date_create_from_format('d/m/Y', $fecha_inicio);
        $date2 = date_create_from_format('d/m/Y', $fecha_fin);
        $query = "SELECT titulo FROM actividad WHERE titulo='$titulo'";
        $resultado = mysqli_query($enlace, $query);
        if (mysqli_num_rows($resultado) > 0) {
            echo "<p>Error: Ya hay una actividad creada.</p>";
        }
        else if ($date1 > $date2){
            $estado = "Las fechas estan mal introducidas"; 
        }
        else{
            $query = "INSERT INTO actividad (titulo, id_tipo, id_departamento, id_profesor_responsable, trimestre, fecha_inicio, hora_inicio, fecha_fin, hora_fin, id_organizador, acompanantes, id_ubicacion, coste, total_alumnos, objetivo, aprobada, id_usuario ) VALUES ('$titulo', '$tipo', '$departamento', '$profesor','$trimestre', '$fecha_inicio', '$hora_inicio', '$fecha_fin', '$hora_fin', '$organizador', '$acompanantes', '$ubicacion', '$coste', '$Talumnos', '$objetivo', 'No', '$idusuario'   )";
            if (mysqli_query($enlace, $query)) {
            // Enviar correo electrónico de confirmación
            $estado = "Actividad insertada exitosamente";
            } else {
            $estado = "Error al insertar actividad";
            }
        }
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
    <title>Creación actividad | Management Machado</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
       <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet"  
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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
<h2> Creacion de actividades </h2>
<button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script>
 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="titulo">titulo:</label>
        <input type="text" name="titulo"><br>
        <label for="tipo">tipo:</label>
        <select name="tipo">
            <option selected value="0" disabled> </option>
            <option value="1" > Extraescolar </option>
            <option value="2" > Complementaria </option>
        </select> <br>
        <label for="departamento">departamento:</label>
        <select name="departamento" id="departamento">
            <option selected value="0" disabled></option>
            <?php echo $sdepartamento ?>
        <!--<option value="1"> Lengua </option>
            <option value="2"> Matemáticas </option>
            <option value="3"> Educacion Física </option>
            <option value="4"> Informatica </option>
            <option value="5"> Física y Quimica </option> -->
        </select> <br>
        <label for="profesor">Profesor responsable:</label>
        <select name="profesor" id="profesor">
            <option selected value="0" disabled> Selecciona un departamento</option>
        </select> <br>
        <label for="trimestre">trimestre:</label>
        <select name="trimestre">
            <option selected value="0" disabled></option>
            <option value="1"> 1ºTrimestre </option>
            <option value="2"> 2ºTrimestre </option>
            <option value="3"> 3ºTrimestre </option>
        </select> <br>
        <label for="fecha_inicio">fecha_inicio:</label>
        <input id="fecha_inicio" name="fecha_inicio" readonly='true'><br>
        <label for="fecha_fin">fecha_fin:</label>
        <input id="fecha_fin" name="fecha_fin" readonly='true'><br>
        <label for="hora_inicio">hora_inicio:</label>
        <select name="hora_inicio" id="hora_inicio">
            <option selected value="0" disabled></option>
            <option value="15:30"> 15:30 </option>
            <option value="16:30"> 16:30 </option>
            <option value="17:30"> 17:30 </option>
            <option value="18:15"> 18:15 </option>
        </select> <br>
        <label for="hora_fin">hora_fin:</label>
        <select name="hora_fin" id="hora_fin">
            <option selected value="0" disabled>Selecciona hora inicio</option>
        </select> <br>
        <label for="organizador">organizador:</label>
         <select name="organizador" id="organizador">
            <option selected value="0" disabled> Selecciona un departamento</option>
        </select> <br>
        <label for="acompanantes" id="cajaacompanantes">acompañantes:</label>
        <textarea name="acompanantes"></textarea><br>
        <label for="ubicacion">ubicacion:</label>
        <select name="ubicacion">
            <option selected value="0" disabled></option>
            <option value="1"> Gimnasio </option>
            <option value="2"> Aula informatica </option>
            <option value="3"> Aula 104 </option>
            <option value="4"> Biblioteca </option>
        </select> <br>
        <label for="coste">Coste:</label>
        <input type="number" name="coste"><br>
        <label for="Talumnos">Total alumnos:</label>
        <input type="number" name="Talumnos"><br>
        <label for="objetivo" id="cajatextarea">Objetivo:</label>
        <textarea name="objetivo"></textarea><br>
        <button type="submit">Crear actividad</button>
    </form> <br>
      <?php echo $estado ?>
      <br> <br> 
    <button onclick="location.href = 'index.php';">Volver a la pagina principal</button>
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
    $(document).ready(function () {
        $("#fecha_inicio").datepicker()
        $("#fecha_fin").datepicker()

            
           $("#hora_inicio").change(function () {
                var hora = $(this).val();
                if (hora == "15:30") {
            $("#hora_fin").html("<option selected value='0' disabled></option> <option value='16:15'>16:15</option> <option value='17:15'>17:15</option>");
        } else if (hora == "16:30") {
             $("#hora_fin").html("<option selected value='0' disabled></option> <option value='17:15'>17:15</option><option value='18:45'>18:45</option>");
        } else if (hora == "17:30") {
             $("#hora_fin").html("<option selected value='0' disabled></option> <option value='18:45'>18:45</option><option value='19:15'>19:15</option>");
        } else if (hora == "18:15") {
             $("#hora_fin").html("<option value='19:15'>19:15</option>");
        }});

           $("#departamento").change(function () {
                var valor = $(this).val();
                if (valor == "1") {
            $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Francisco Javier Garcia</option> <option value='2'>Rocio Macgire</option> <option value='3'>Mariano Gimenez Santi</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Francisco Javier Garcia</option>");
        } else if (valor == "2") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='4'>Mario Barbaroja</option><option value='5'>Gloria Buenafuentes</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='2'>Mario Barbaroja</option>");
        } else if (valor == "3") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='6'>Carlos Manuel Vivagua</option><option value='7'>John Comepiedras</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='3'>Carlos Manuel Vivagua</option>");
        } else if (valor == "4") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='8'>Maria Fuentes Ortiz</option><option value='9'>Isabel Ruiz Pilar</option><option value='10'>Juan Dominguez Buenaventura</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='4'>Maria Fuentes Ortiz</option><option value='5'>Isabel Ruiz Pilar</option>");
        } else if (valor == "5") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='11'>Luz Benites Torres</option><option value='12'>Bernat Dacosta</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='6'>Luz Benites Torres</option>");
    }});
    });


      /*  function functdepartamento(prefijo,seleccion) {
            var opcionelegida = (seleccion.options[seleccion.selectedIndex].value)

                if (opcionelegida = "1"){
                    var cosa = document.
                }
  var x = document.getElementById("mySelect").value;
  document.getElementById("demo").innerHTML = "You selected: " + x;*/

    </script>
</body>
</html>