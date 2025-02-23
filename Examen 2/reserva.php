<?php
$showdivflag=false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellidos = htmlspecialchars(trim($_POST['apellidos']));
    $email = htmlspecialchars(trim($_POST['email']));
    $dni = htmlspecialchars(trim($_POST['dni']));
    $diaentrada = htmlspecialchars(trim($_POST['diaentrada']));
    $diaactual = date("d/m/Y");
    $numerodias = htmlspecialchars(trim($_POST['numerodias']));
    $tipohabitacion = htmlspecialchars(trim($_POST['tipohabitacion']));
    switch ($tipohabitacion) {
            case '30':
                $Rtipohabitacion = "Simple";
                $imagen = "hab0.png";
                break;
            case '50':
                $Rtipohabitacion = "Doble";
                $imagen = "hab1.png";
                break;
            case '80':
                $Rtipohabitacion = "Triple";
                $imagen = "hab2.png";
                break;
            case '100':
                $Rtipohabitacion = "Suite";
                $imagen = "hab3.png";
                break;
            default:
                $Rtipohabitacion = "No se seleccionó tipo de habitación";
                break; }
    $importetotal = $numerodias * $tipohabitacion;    
    $datosreserva = "<h2> Datos Reserva </h2>";
    
    function validarDNI($dni) {
    $letra = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $cadenaSinEspacios = str_replace(" ", "", $dni); // Remove spaces
    $cadenaLimpia = strtoupper($cadenaSinEspacios); // Convert to uppercase
    if (strlen($cadenaLimpia) < 9) {
        return false; // Invalid DNI (too short)
    }
    $numero = intval(substr($cadenaLimpia, 0, 8)); // Numeric part
    $letraUsuario = $cadenaLimpia[8]; // Letter entered by the user
    $letraReal = $letra[$numero % 23]; // Real letter based on the formula

    if ($letraUsuario != $letraReal) {
        return false; // Invalid DNI
    } else {
        return true; // Valid DNI
    }
}

function validarEmail($email) {
    $validEmail = "/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/";
    if ($email == "") {
        return false; // Empty email is allowed
    } else if (!preg_match($validEmail, $email)) {
        return false; // Invalid email format
    } else {
        return true; // Valid email format
    }
}

    if(empty($nombre) || empty($apellidos) || !validarEmail($email) || !validarDNI($dni) || empty($diaentrada)  || empty($numerodias) ||  $numerodias < 0){   
        echo "<script>alert('Todos los datos deben de estar introducidos correctamente')</script>";        
    }else{ $showdivflag=true; }
}
?>

<html>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
<label for="nombre">Nombre:</label>
<input type="text" name="nombre"><br>
<label for="Apellidos">Apellidos</label>
<input type="text" name="apellidos"><br>
<label for="email" >Email</label>
<input type="email" name="email"><br>
<label for="DNI">DNI:</label>
<input type="text" name="dni"><br>
<label for="diaentrada">Dia de entrada:</label>
<input type="date" name="diaentrada" min="<?php echo date('Y-m-d'); ?>"><br>
<label for="numerodias">Numero dias reserva:</label>
<input type="number" name="numerodias" min="1"><br>
<label for="tipohabitacion">Tipo de habitacion:</label>
<select name="tipohabitacion">
<option value="30"> simple(30€) </option>
<option value="50"> doble(50€) </option>
<option value="80"> triple(80€) </option>
<option value="100"> suite(100€) </option>
</select><br>
<button type="submit">Realizar reserva</button>
</form>

<div <?php if ($showdivflag===false){?> style="display:none" <?php } ?>>
<?php echo  $datosreserva . "Nombre: " . $nombre . "<br> Apellidos: " . $apellidos . "<br> Email: " . $email . "<br> DNI: " . $dni . "<br> Dia entrada: " . $diaentrada . "<br> Numero Dias: " . $numerodias . "<br> Tipo de habitacion: " . $Rtipohabitacion . "<br> Importe total: " . $importetotal . "€ <br> <br> <center> <img width='50%' height='50%' src='" . $imagen . "'> <center>";    ?>
</div>

</body>
</html>
