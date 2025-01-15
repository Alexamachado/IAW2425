<?php
 $servername = "sql308.thsite.top"; //Nombre del servidor
 $username = "thsi_38097488"; //Nombre del usuario
 $password = "*******"; //Contraseña

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Conexion fallida " . mysqli_connect_error());
}
echo "Conexion exitosa";
?> 