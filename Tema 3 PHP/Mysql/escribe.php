<?php
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
  $query = "INSERT INTO usuarios(nombre, apellido, email) VALUES ('Alberto','Moreno','Carrero')";
// Ejecución de la Query
  $resultado = mysqli_query($enlace, $query);
  //print_r($resultado);
// Procesamiento de los resultados
        if($resultado){
            echo "Registro insertado correctamente";
        }else{
            echo "Conexión fallida";
        }
// Cierre de la conexión
  mysqli_close($enlace);
?>