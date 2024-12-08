<!doctype html>
<html>
<head></head>
<body>
	<?php
    $fecha = date('d-m-Y');
    $fechaactual = date_create($fecha);
    $fechaferia = date_create("06-05-2025");
    $diferencia = date_diff($fechaactual,$fechaferia);
    $differenceformat = '%a';
    echo "Quedan " . $diferencia->format($differenceformat) . " dias"; 
    //echo $diferencia->format("%a días quedan para la feria!");
    ?>
</body>
</html>
<!-- feria.php. La Feria de 2025 comenzará el 6 de mayo. Realiza un script PHP que utilizando 
      date muestre al usuario cuántos días quedan para que comience la Feria.-->