<?php include "templates/header.php"; ?>

<?php
include 'funciones.php';
// Conexión a la base de datos
$servername = "sql308.thsite.top"; // Nombre del servidor
$username = "thsi_38097488"; // Nombre de usuario
$password = "!?TD4GUr"; // Contrasena
$dbname = "thsi_38097488_ejemplo";
$enlace = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $titulo = htmlspecialchars(trim($_POST['titulo']));
    $tipo = htmlspecialchars(trim($_POST['tipo']));
    $departamento = htmlspecialchars(trim($_POST['tipo']));
    $profesor = htmlspecialchars(trim($_POST['profesor']));
    $trimestre = htmlspecialchars(trim($_POST['trimestre']));
    $fecha_inicio = htmlspecialchars(trim($_POST['fecha_inicio']));
    $fecha_fin = htmlspecialchars(trim($_POST['fecha_fin']));
    $hora_inicio = htmlspecialchars(trim($_POST['hora_inicio']));
    $hora_fin = htmlspecialchars(trim($_POST['hora_fin']));
    $organizador = htmlspecialchars(trim($_POST['organizador']));
    $acompanantes = htmlspecialchars(trim($_POST['acompanantes']));
    $ubicacion = htmlspecialchars(trim($_POST['ubicacion']));
    $coste = htmlspecialchars(trim($_POST['coste']));
    $total_alumnos = htmlspecialchars(trim($_POST['total_alumnos']));
    $objetivo = htmlspecialchars(trim($_POST['objetivo']));

    if (empty($titulo) || $tipo == "0" || empty($departamento) || empty($profesor) || empty($trimestre)
       || empty($fecha_inicio) || empty($fecha_fin) || empty($hora_inicio) || empty($hora_fin)
       || empty($organizador) || empty($acompanates) || empty($ubicacion) || empty($coste) 
       || empty($total_alumnos) || empty($objetivo)) {
        die("Error: Todos los campos son obligatorios.");
    }

    // Verificar si el usuario ya existe
    $query = "SELECT id FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($enlace, $query);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<p>Error: El usuario ya está registrado.</p>";
    }
    else{
        // Cifrar la contraseña
        $password_encrypted = $contrasena; // Sin cifrar (GRAN ERROR)
        // $password_encrypted = crypt($password, '$6$rounds=5000$' . uniqid(mt_rand(), true) . '$');

        // Insertar datos en la base de datos
        $query = "INSERT INTO actividad (titulo, id_tipo, id_departamento, id_profesor_responsable, trimestre, 
        fecha_inicio, hora_inicio, fecha_fin, hora_fin, id_organizador, acompañantes, id_ubicacion, coste, total_alumnos, objetivo ) VALUES ('$titulo', '$apellido', '$email', '$password_encrypted')";

        if (mysqli_query($enlace, $query)) {
            // Enviar correo electrónico de confirmación
            $asunto = "Registro exitoso";
            $mensaje = "Hola $nombre,\n\nGracias por registrarte. Estos son tus datos:\nNombre: $nombre\nApellidos: $apellido\nEmail: $email\n\nSaludos.";
            $cabeceras = "From: no-reply@mi-sitio.com";

            if (mail($email, $asunto, $mensaje, $cabeceras)) {
                echo "Usuario registrado correctamente. Se ha enviado un correo de confirmación.";
            } else {
                echo "Usuario registrado, pero no se pudo enviar el correo.";
            }
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($enlace);
        }
    }
}

mysqli_close($enlace);
?>

<?php include 'templates/header.php'; ?>

<?php
 <form method="POST" action="registro.php">
        <label for="titulo">titulo:</label>
        <input type="text" id="titulo" name="titulo"><br>
        <label for="tipo">tipo:</label>
        <select name="tipo">
            <option selected value="0" disable> </option>
            <option value="1" > extraescolares </option>
            <option value="2" > complementarias </option>
        </select>
        <select name="departamento">
            <option selected value="0" disable></option>
            <option value="1"> Matematicas </option>
            <option value="2"> Fisica </option>
            <option value="3"> Quimica </option>
            <option value="4"> Informatica </option>
            <option value="5"> Lengua </option>
        </select>
        <select name="profesor">
            <option selected value="0" disable></option>
            <option value="1"> zzzz </option>
            <option value="2"> xxx </option>
            <option value="3"> xxx </option>
            <option value="4"> xxx </option>
            <option value="5"> xxx </option>
        </select>
        <select name="trimestre">
            <option selected value="0" disable></option>
            <option value="1"> 1ºTrimestre </option>
            <option value="2"> 2ºTrimestre </option>
            <option value="3"> 3ºTrimestre </option>
        </select>
        <label for="fecha_inicio">fecha_inicio:</label>
        <input type="date" name="fecha_inicio"><br>
        <label for="fecha_fin">fecha_fin:</label>
        <input type="date" name="fecha_fin"><br>
        <select name="hora_inicio">
            <option selected value="0" disable></option>
            <option value="1"> 15:00 </option>
            <option value="2"> 16:30 </option>
            <option value="3"> 17:30 </option>
            <option value="4"> 18:15 </option>
        </select>
        <label for="hora_fin">hora_fin:</label>
        <input type="time" name="hora_fin"><br>
         <select name="organizador">
            <option selected value="0" disable></option>
            <option value="1"> xxx </option>
            <option value="2"> xxx </option>
            <option value="3"> xxx </option>
            <option value="4"> xxx </option>
        </select>
        <select name="ubicacion">
            <option selected value="0" disable></option>
            <option value="1"> Gimnasio </option>
            <option value="2"> Aula informatica </option>
            <option value="3"> Aula 104 </option>
            <option value="4"> Biblioteca </option>
        </select>
        <label for="coste">Coste:</label>
        <input type="number" name="coste"><br>
        <label for="Talumnos">Total alumnos:</label>
        <input type="number" name="Talumnos"><br>
        <label for="Objetivo">Objetivo:</label>
        <input type="text" name="objetivo"><br>
        <button type="submit">Crear actividad</button>
    </form>

</body>
</html>