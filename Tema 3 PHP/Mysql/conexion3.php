<?php         //PDO
 $servername = "sql308.thsite.top"; //Nombre del servidor
 $username = "thsi_38097488"; //Nombre del usuario
 $password = "*******"; //Contraseña


try {
  $conn = new PDO("mysql:host=$servername;dbname=thsi_38097488_ejemplo", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected exitosa";
} catch(PDOException $e) {
  echo "Connection fallida: " . $e->getMessage();
}
?> 