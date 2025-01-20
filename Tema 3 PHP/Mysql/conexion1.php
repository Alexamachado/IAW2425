<?php   //          //Mysqli object-oriented
    $servername = "sql308.thsite.top"; //Nombre del servidor
    $username = "thsi_38097488"; //Nombre del usuario
    $password = "xxxxx"; //Contraseña

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>

<!--conexion.php. Realiza un script que muestre un mensaje en 
 pantalla si ha habido éxito o no a la hora de conectarse con MySQL. -->