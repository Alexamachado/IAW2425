<?php
// Conexión a la base de datos
$servername = "sql308.thsite.top"; // Nombre del servidor
$username = "thsi_38097488"; // Nombre de usuario
$password = "xxxxx"; // Contrasena
$dbname = "thsi_38097488_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}
  $titulo=$departamento=$trimestre="";
if (isset($_POST["1actividad"])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $departamento = $_POST['departamento'];
    $trimestre = $_POST['trimestre'];
    if (empty($titulo) || $departamento=="depart0"  || $trimestre=="0"){
        die("Error: Todos los campos son obligatorios.");
    }

    $query = "SELECT * FROM actividad WHERE titulo='$titulo' AND id_departamento='$departamento' AND trimestre='$trimestre'";   
    $resultado = mysqli_query($enlace, $query);
    if (mysqli_num_rows($resultado) > 0) {
        echo "HOLA";
        $fila = mysqli_fetch_assoc($resultado);
        $qdepartamento = "SELECT nombre FROM departamento WHERE id_departamento='$fila[id_departamento]'";
        echo $qdepartamento;
        $rdepartamento = mysqli_query($enlace, $qdepartamento);
       // print_r($rdepartamento["nombre"]);
         $qprofesor = "SELECT nombre, apellidos  FROM profesor_responsable WHERE id_profesor_responsable='$fila[id_profesor_responsable]'";
        $rprofesor = mysqli_fetch_assoc(mysqli_query($enlace, $qprofesor));
        $allprofesor = $rprofesor["nombre"] . " " . $rprofesor["apellidos"];

        $porganizador = "SELECT id_profesor_responsable FROM organizador WHERE id_organizador='$fila[id_organizador]'";
        $sorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $porganizador)); 
        $qorganizador = "SELECT nombre, apellidos FROM profesor_responsable WHERE id_profesor_responsable='$sorganizador[id_profesor_responsable]'";
        $rorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $qorganizador));
        $allorganizador = $rorganizador["nombre"] . " " . $rorganizador["apellidos"];


        while($fila){
            echo "Titulo: " . $fila["titulo"] . "tipo: " . $fila["id_tipo"] .
            "Departamento: " . $rdepartamento["nombre"] . "Profesor responsable: " . $allprofesor . 
            "Trimestre: " . $fila["trimestre"] . "Fecha inicio: " . $fila["fecha_inicio"] .
            "Fecha fin: " . $fila["fecha_fin"] . "Hora inicio: " . $fila["email"] .
            "Organizador: " . $allorganizador . "Acompañantes: " . $fila["acompanantes"] .
            "Ubicación: " . $fila["zzzz"] . "Coste: " . $fila["coste"] .
            "Total alumnos: " . $fila["total_alumnos"] . "Objetivo: " . $fila["objetivo"] . "<br>";
        }
    }else{
            echo "No hubo resultados";
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

 <form method="POST" action="leer2.php">
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
        </select>
        <button type="submit" name="1actividad"> Buscar una actividad  </button> <button type="submit" name="todasactividades"> Buscar todas las actividades  </button>
        </form>
   
</body>
</html>