<?php         //Mysqli procedural
//Conexion con BD 
  $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "password";
  $dbname = "thsi_38097488_ejemplo";
  $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }
//Construcción de la Query
  $query = "UPDATE usuarios SET nombre='Juan', apellido='Perez Lopez' WHERE id=6";
// Ejecución de la Query
  $resultado = mysqli_query($enlace, $query);
  //print_r($resultado);
// Procesamiento de los resultados
        if($resultado){
            echo "Registro actualizado correctamente";
        }else{
            echo "Conexión fallida";
        }
// Cierre de la conexión
  mysqli_close($enlace);
?>

<!-- actualiza.php. Realiza un script en PHP que permita actualizar un 
campo de la tabla usuarios. Puedes utilizar para filtrar, por ejemplo, 
el campo id. -->