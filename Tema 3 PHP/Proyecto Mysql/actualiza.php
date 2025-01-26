<?php
//Conexion con BD 
  $servername = "sql308.thsite.top";
  $username = "thsi_38097488";
  $password = "!?TD4GUr";
  $dbname = "thsi_38097488_ejemplo";
  $enlace = mysqli_connect($servername,$username,$password,$dbname);
  if (!$enlace){
      die("Ocurrio un problema con la conexion:" . mysqli_connect_error());
  }
//Construcción de la Query
  $query = "UPDATE actividad SET nombre='Juan', apellido='Perez Lopez' WHERE id=9";
// Ejecución de la Query
  $resultado = mysqli_query($enlace, $query);
  print_r($resultado);
// Procesamiento de los resultados
        if($resultado){
            echo "Registro actualizado correctamente";
        }else{
            echo "Conexión fallida";
        }
// Cierre de la conexión
  mysqli_close($enlace);
?>

<?php include 'templates/header.php'; ?>


 <form method="POST" action="actualiza.php">
        <label for="titulo">titulo:</label>
        <input type="titulo" id="titulo" name="titulo"><br>
        <label for="id_departamento">id_departamento:</label>
        <input type="text" id="id_departamento" name="id_departamento"><br>
        <label for="profesor_responsable">profesor_responsable:</label>
        <input type="profesor_responsable" id="profesor_responsable" name="profesor_responsable"><br>
        <label for="trimestre">trimestre:</label>
        <input type="trimestre" id="trimestre" name="trimestre"><br>
        <button type="submit">Actualizar</button>
    </form>




<?php include 'templates/footer.php'; ?>