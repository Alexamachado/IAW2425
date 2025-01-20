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
  $query = "ALTER TABLE usuarios ADD fullname VARCHAR( 30 ),
            ALTER TABLE usuarios ADD contrasena VARCHAR( 30 ) AFTER apellido";
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

      <!-- anadircolumna.php. Realiza un script PHP que permita añadir un par 
       de nuevas columnas a la tabla usuarios: fullname y email. -->