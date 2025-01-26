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
  
 $result = "";

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = htmlspecialchars(trim($_POST['borrado']));
    if (empty($titulo)){
        $result = "Tienes que elegir una actividad";
    }
  
//Construcción de la Query
 $query = "SELECT * FROM usuarios LIMIT 1";
  $resultado = mysqli_query($enlace, $query);
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
//Construcción de la Query
  



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


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Aplicación CRUD PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  </head>
  <body>
    <h2> Borrado de actividades </h2>
 <form method="POST" action="borrado.php">
        <label for="borrado">Introduce titulo actividad:</label>
        <input type="text"  name="borrado">
        <button type="submit">Borrar actividad</button> <br>

    <?php echo $result ?>
    </form>
</body>
</html>