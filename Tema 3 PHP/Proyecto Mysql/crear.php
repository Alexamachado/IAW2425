<?php
// Conexión a la base de datos
$servername = "sql308.thsite.top"; // Nombre del servidor
$username = "thsi_38097488"; // Nombre de usuario
$password = "xxxx"; // Contrasena
$dbname = "thsi_38097488_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$estado=""
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
    $coste = htmlspecialchars(trim($_POST['coste']));
    $Talumnos = htmlspecialchars(trim($_POST['Talumnos']));
    $objetivo = htmlspecialchars(trim($_POST['objetivo']));

    if (empty($titulo) || $tipo == "0" || $departamento == "0" || $profesor == "0" || empty($trimestre)
       || empty($fecha_inicio) || empty($fecha_fin) || empty($hora_inicio) || empty($hora_fin)
       || $organizador == "0" || empty($acompanantes) || $ubicacion == "0" || empty($coste) 
       || empty($Talumnos) || empty($objetivo)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Verificar si la actividad ya existe
    $query = "SELECT titulo FROM actividad WHERE titulo='$titulo'";
    $resultado = mysqli_query($enlace, $query);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<p>Error: Ya hay una actividad creada.</p>";
    }
    else{
        $query = "INSERT INTO actividad (titulo, id_tipo, id_departamento, id_profesor_responsable, trimestre, 
        fecha_inicio, hora_inicio, fecha_fin, hora_fin, id_organizador, acompanantes, id_ubicacion, coste, total_alumnos, objetivo ) VALUES ('$titulo', '$tipo', '$departamento', '$profesor','$trimestre', '$fecha_inicio', '$hora_inicio', '$fecha_fin', '$hora_fin', '$organizador', '$acompanantes', '$ubicacion', '$coste', '$Talumnos', '$objetivo'   )";
        if (mysqli_query($enlace, $query)) {
            // Enviar correo electrónico de confirmación
            $estado = "Actividad insertada exitosamente";
        } else {
            $estado = "Error al insertar actividad";
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
    <title>Aplicación CRUD PHP</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet"  
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        #cajatextarea{
            vertical-align: top;
        }
    </style>
  </head>
  <body>

 <form method="POST" action="crear.php">
        <label for="titulo">titulo:</label>
        <input type="text" name="titulo"><br>
        <label for="tipo">tipo:</label>
        <select name="tipo">
            <option selected value="0" disabled> </option>
            <option value="1" > extraescolar </option>
            <option value="2" > complementaria </option>
        </select> <br>
        <label for="departamento">departamento:</label>
        <select name="departamento" id="departamento">
            <option selected value="depart0" disabled></option>
            <option value="1"> Lengua </option>
            <option value="2"> Matemáticas </option>
            <option value="3"> Educacion Física </option>
            <option value="4"> Informatica </option>
            <option value="5"> Física y Quimica </option>
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
        <input type="date" name="fecha_inicio"><br>
        <label for="fecha_fin">fecha_fin:</label>
        <input type="date" name="fecha_fin"><br>
        <label for="hora_inicio">hora_inicio:</label>
        <select name="hora_inicio">
            <option selected value="0" disabled></option>
            <option value="1"> 15:30 </option>
            <option value="2"> 16:30 </option>
            <option value="3"> 17:30 </option>
            <option value="4"> 18:15 </option>
        </select> <br>
        <label for="hora_fin">hora_fin:</label>
        <select name="hora_fin">
            <option selected value="0" disabled></option>
            <option value="1"> 16:15 </option>
            <option value="2"> 17:15 </option>
            <option value="3"> 19:15 </option>
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
    </form>
      <?php echo $estado ?>
    <script>
    $(document).ready(function () {
           $("#departamento").change(function () {
                var valor = $(this).val();
                if (valor == "1") {
            $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Francisco Javier Garcia</option> <option value='2'>Rocio Macgire</option> <option value='3'>Mariano Gimenez Santi</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Francisco Javier Garcia</option>");
        } else if (valor == "2") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Mario Barbaroja</option><option value='2'>Gloria Buenafuentes</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Mario Barbaroja</option>");
        } else if (valor == "3") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Carlos Manuel Vivagua</option><option value='2'>John Comepiedras</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Carlos Manuel Vivagua</option>");
        } else if (valor == "4") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Maria Fuentes Ortiz</option><option value='2'>Isabel Ruiz Pilar</option><option value='3'>Juan Dominguez Buenaventura</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Maria Fuentes Ortiz</option><option value='2'>Isabel Ruiz Pilar</option>");
        } else if (valor == "5") {
             $("#profesor").html("<option selected value='0' disabled> Selecciona un profesor</option> <option value='1'>Luz Benites Torres</option><option value='2'>Bernat Dacosta</option>");
             $("#organizador").html("<option selected value='0' disabled> Selecciona un organizador</option> <option value='1'>Luz Benites Torres</option>");
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