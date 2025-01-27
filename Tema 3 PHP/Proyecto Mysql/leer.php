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

if (isset($POST["Tactividades"])) {
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $departamento = $_POST['departamento'];
    $trimestre = $_POST['trimestre'];

    if (empty($titulo) || $departamento == "0"  || empty($trimestre)){
        die("Error: Todos los campos son obligatorios.");
    }

    $query = "SELECT * FROM actividad";   
    $resultado = mysqli_query($enlace, $query);
    echo $query;
    if (mysqli_num_rows($resultado) > 0) {

        $fila = mysqli_fetch_assoc($resultado);
        echo "Entro en 1";
        $qdepartamento = "SELECT NOMBRE FROM departamento WHERE id_departamento='$fila[id_departamento]'";
        $rdepartamento = mysqli_query($enlace, $qdepartamento);
        $qprofesor = "SELECT nombre, apellidos  FROM profesor_responsable WHERE id_profesor_responsable='$fila[id_profesor_responsable]'";
        $rprofesor = mysqli_fetch_assoc(mysqli_query($enlace, $qprofesor));
        $allprofesor = $rprofesor["nombre"] . " " . $rprofesor["apellidos"];

        $porganizador = "SELECT id_profesor_responsable FROM organizador WHERE id_organizador='$fila[id_organizador]'";
        $sorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $porganizador)); 
        $qorganizador = "SELECT nombre, apellidos FROM profesor_responsable WHERE id_profesor_responsable='$sorganizador[id_profesor_responsable]'";
        $rorganizador = mysqli_fetch_assoc(mysqli_query($enlace, $qorganizador));
        $allorganizador = $rorganizador["nombre"] . " " . $rorganizador["apellidos"];

        $qubicacion = "SELECT NOMBRE FROM ubicacion WHERE id_ubicacion='$fila[id_ubicacion]'";
        $rubicacion = mysqli_query($enlace, $rubicacion);

        while($fila = mysqli_fetch_assoc($resultado)){
            echo "Titulo: " . $fila["titulo"] . "tipo: " . $fila["apellido"] .
            "Departamento: " . $rdepartamento . "Profesor responsable: " . $allprofesor . 
            "Trimestre: " . $fila["trimestre"] . "Fecha inicio: " . $fila["fecha_inicio"] .
            "Fecha fin: " . $fila["fecha_fin"] . "Hora inicio: " . $fila["email"] .
            "Organizador: " . $allorganizador . "Acompañantes: " . $fila["acompanantes"] .
            "Ubicación: " . $rubicacion . "Coste: " . $fila["coste"] .
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

 <form method="POST" action="leer.php">
        <button type="submit" name="Tactividades"> Buscar todas las actividades  </button>
        </form>
   
</body>
</html>