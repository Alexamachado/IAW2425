<?php
<<<<<<< HEAD
session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Aplicación CRUD PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        a:hover{
            color:rgb(28, 134, 221);
        }
        a{
            color:black;
            text-decoration:none;
        }
        .secciones{
            font-family:verdana;
            out
        }
        .contenedor2 {
            max-width: 1170px; 
            margin-left: auto;
            margin-right: auto;
            padding: 1em;
        }
        ul {
            border: 2px solid lightgray;
            list-style: none; /* Elimino los puntos */

        }
    </style>
    
  </head>
  <body>

<div class="contendor1">
    <h2> Bienvenido <?php echo $_SESSION['nombre'];  ?>  </h2>
    <h3> Esta en la pagina principal <h3>
=======
include 'funciones.php';

$error = false;
$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['apellido'])) {
    $consultaSQL = "SELECT * FROM alumnos WHERE apellido LIKE '%" . $_POST['apellido'] . "%'";
  } else {
    $consultaSQL = "SELECT * FROM alumnos";
  }

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $resultados = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error= $error->getMessage();
}

$titulo = isset($_POST['apellido']) ? 'Lista de alumnos (' . $_POST['apellido'] . ')' : 'Lista de alumnos';
?>

<?php include "templates/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="crear.php"  class="btn btn-primary mt-4">Crear alumno</a>
      <hr>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="apellido" name="apellido" placeholder="Buscar por apellido" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Ver resultados</button>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-3"><?= $titulo ?></h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($alumnos && $sentencia->rowCount() > 0) {
            foreach ($alumnos as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["id"]); ?></td>
                <td><?php echo escapar($fila["nombre"]); ?></td>
                <td><?php echo escapar($fila["apellido"]); ?></td>
                <td><?php echo escapar($fila["email"]); ?></td>
                <td><?php echo escapar($fila["edad"]); ?></td>
                <td>
                  <a href="<?= 'borrar.php?id=' . escapar($fila["id"]) ?>">🗑️Borrar</a>
                  <a href="<?= 'editar.php?id=' . escapar($fila["id"]) ?>" . >✏️Editar</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
    </div>
  </div>
>>>>>>> 829a5a7aa2173e6f98693f9339614a4a109fdea5
</div>

<div class="contenedor2">
  <ul>
   <li> <a class="secciones" href="http://alexguerrero.is-great.net/ProyectoMysql/crear.php"> Creacion de 
    actividades </a> </li>

  <li><a class="secciones" href="http://alexguerrero.is-great.net/ProyectoMysql/actualiza.php"> Actualizacion de actividades </a> </li>

  <li> <a class="secciones" href="http://alexguerrero.is-great.net/ProyectoMysql/leer.php"> Lectura de actividades </a> </li>

  <li> <a class="secciones" href="http://alexguerrero.is-great.net/ProyectoMysql/borrado.php"> Borrado de usuarios </a> </li>
  </ul>
</div>


</body>
</html>