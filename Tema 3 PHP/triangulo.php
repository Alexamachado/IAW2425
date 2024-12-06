<<<<<<< HEAD
<!doctype html>
<html>
<head>
	<title>Examen</title>
</head>
<body>
<h1>Triángulo</h1>
<form id="formulario" action="triangulo.php">
	<input type="text" name="numero" id="numero">
	<input type="submit" value="Enviar">
</form>
<?php
	if (isset($_GET["numero"])){
		$numero = htmlspecialchars($_GET["numero"]);
		if ($numero>0 && is_numeric($numero)){
			for ($i=$numero;$i>=1;$i--)
			{	
				for($j=1;$j<=$i;$j++)
				{
					echo "* ";
				}
				echo "<br>";
			}
		}
		else{
			echo "<p>Error. Hacker no te saltes el Javascript!</p>";
		}
	}
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', compruebaNumero); 
});
	function compruebaNumero(evento){
		evento.preventDefault();
		let numero=parseInt(document.getElementById('numero').value);
		if (numero<=0 || isNaN(numero)){
			alert("¡Error!¡Debes escribir número positivo mayor que cero!");
			return;
		}
		this.submit();
	}
</script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangulo</title>
</head>
<body>
    <form id="formulario" action="triangulo.php">
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Enviar">
    </form>

    

    <p>Introduce un numero positivo</p>
    <input type="number" id="introducido"> <button onclick="trinagulo()">Enviar</button>
    <?php
        $introducido = "document.getelementb"
        function triangulo(){
            foreach ($introducido as $numero){
                echo "<div></div>"
                
            }

        }   
    ?>
</body>
</html>
>>>>>>> 90f3c8e6d50d9b2c96e714e32c6dbf7f6503e334
