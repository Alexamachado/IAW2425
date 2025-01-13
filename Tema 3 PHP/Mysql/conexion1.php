<?php
    $servername = "sql308.thsite.top"; //Nombre del servidor
    $servername = "thsi_38097488"; //Nombre del usuario
    $password = "*******"; //Contraseña

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
?>