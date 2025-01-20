<?php               //Mysqli procedural
//Conexion con BD 
    $servername = "sql308.thsite.top";
    $username = "thsi_38097488";
    $password = "xxxxx";
    $dbname = "thsi_38097488_ejemplo";
    $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }
  
//Construcción de la Query
  $query = "SELECT * FROM usuarios LIMIT 1";
// Ejecución de la Query
  $resultado = mysqli_query($enlace, $query);
  //print_r($resultado);
// Procesamiento de los resultados
  if (mysqli_num_rows($resultado) > 0){  //Al menos tengo un registro
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "Nombre: " . $fila["nombre"] . "Apellido: " . $fila["apellido"] .
            "Email: " . $fila["email"] . "<br>";
        }
        }else{
            echo "No hubo resultados en la tabla";
        }
         
// Cierre de la conexión
  mysqli_close($enlace);
?>

<!-- leer1fila.php. Realiza un script que muestre un registro de la 
 tabla usuarios. -->