<?php
session_start(); 
if (!isset($_SESSION['sesion'])) { header("Location: inicio.php");}
include('templates/conexion.php');

$departamento=$trimestre="";

if (isset($_POST['departamento'])) {
    $departamento_id = $_POST['departamento'];
    // Asignamos un valor distinto al seleccionado, por ejemplo, un código específico
    switch ($departamento_id) {
        case 1:
            $departamento = "1";
            break;
        case 2:
            $departamento = "2";
            break;
        case 3:
            $departamento = "3";
            break;
        case 4:
            $departamento = "4";
            break;
        case 5:
            $departamento = "5";
            break;
    }
}

if (isset($_POST['trimestre'])) {
    $trimestre_id = $_POST['trimestre'];
    // Asignamos un valor específico para el trimestre
    switch ($trimestre_id) {
        case 1:
            $trimestre = "1";
            break;
        case 2:
            $trimestre = "2";
            break;
        case 3:
            $trimestre = "3";
            break;
    }
}


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

if (isset($_POST['submit'])) {
$queryaprobada = "SELECT aprobada FROM actividad WHERE trimestre='$trimestre' AND id_departamento='$departamento'";   
    $resultadoaprobada = mysqli_query($enlace, $queryaprobada);
    if (mysqli_num_rows($resultadoaprobada) > 0) {
        //while($fila = mysqli_fetch_assoc($resultado)){
        $totalaprobadas = mysqli_num_rows($resultadoaprobada);
        $querysiaprobada = "SELECT aprobada FROM actividad where aprobada='Si' AND trimestre='$trimestre' AND id_departamento='$departamento'";   
        $resultadosiaprobada = mysqli_query($enlace, $querysiaprobada);
        $siaprobadas = mysqli_num_rows($resultadosiaprobada);
        $querynoaprobada = "SELECT aprobada FROM actividad where aprobada='No' AND trimestre='$trimestre' AND id_departamento='$departamento'";   
        $resultadonoaprobada = mysqli_query($enlace, $querynoaprobada);
        $noaprobadas = mysqli_num_rows($resultadonoaprobada);
    }else {
        echo "<script>alert('No existe ninguna actividad aprobada o no aprobada con estas caracteristicas');</script>";
    }
    }

      /* Lo muestra simplemente echo json_encode([
    'totalaprobadas' => $totalaprobadas,
    'siaprobadas' => $siaprobadas,
    'noaprobadas' => $noaprobadas
]);*/


    }else{
            echo "<script>alert('Ha ocurrido un error o no hay datos aun');</script>";
    }

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html>
<head>
<title>Estadísticas | Management Machado</title>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Actividades propuestas", "Actividades aprobadas", "Actividades no aprobadas"];
var yValues = [<?php echo $totalaprobadas ?>, <?php echo $siaprobadas ?>, <?php echo $noaprobadas ?>];
var barColors = ["red", "green","blue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Cantidad de actividades aprobadas"
    },
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,  // Esta opción asegura que el eje Y siempre comience en 0
        }
      }]
    }
  }
});

$('form').submit(function(e) {
    e.preventDefault();  // Prevent the default form submission

    var departamento = $('#departamento').val();
    var trimestre = $('#trimestre').val();

    $.ajax({
        url: "<?php echo $_SERVER['PHP_SELF']; ?>", // Same page
        type: "POST",
        data: {
            departamento: departamento,
            trimestre: trimestre
        },
        success: function(response) {
            // Process the server response (e.g., update the chart)
            var data = JSON.parse(response);
            // Update chart or other elements based on the data
        }
    });
});


</script>

<button id="botonestilo">Modo oscuro</button>
<script src="cambiomodo.js"></script>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="departamento">departamento:</label>
        <select name="departamento" id="departamento">
            <option value="1"> Lengua </option>
            <option value="2"> Matemáticas </option>
            <option value="3"> Educacion Física </option>
            <option value="4"> Informatica </option>
            <option value="5"> Física y Quimica </option>
        </select> <br>
         <label for="trimestre">trimestre:</label>
        <select name="trimestre">
            <option value="1"> 1ºTrimestre </option>
            <option value="2"> 2ºTrimestre </option>
            <option value="3"> 3ºTrimestre </option>
        </select> <br>
        <button type="submit" name="submit">Actualizar estadisticas</button>
</form>

<button onclick="location.href = 'index.php';">Volver a la pagina principal</button>

</body>
</html>