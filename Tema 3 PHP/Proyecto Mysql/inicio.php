<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Pagina inicio | Management Machado</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link id="stylesheet" rel="stylesheet" href="templates/light.css">
    <style>
     #botonestilo{
            position: absolute;
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .contenedorinicio {
            top: 100px;
            max-width: 800px; 
            margin-left: auto;
            margin-right: auto;
            padding: 1em;
            font-family:verdana;
            border: 2px solid lightgray;
            align-content: center;
            justify-content: center;
            text-align: center;
            position: relative
        }
    </style>
  </head>
  <body>
<button id="botonestilo">Modo oscuro</button>
    <script src="cambiomodo.js"></script>

<div class="contenedorinicio">
    <h2> Bienvenido a la administracion del machado  </h2><br>
     <button onclick="window.location='login.php';">Iniciar sesion</button> &nbsp;
  <button onclick="window.location='registrar.php';">Registrarse como nuevo usuario</button>
</div>



</body>
</html>