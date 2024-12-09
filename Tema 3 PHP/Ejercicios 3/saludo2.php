<!doctype html>
<html>
<head></head>
<body>
    
     <form id="formulario" action="saludo2.php" method="POST">
     <label for="">Escribe tu nombre</label> 
     <input type="text" name="nombre" id="nombre"><br>
     <input type="submit" value="Enviar">
     </form>

    <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$nombre = $_POST["nombre"];
	}if (empty($nombre)){
	echo "Debes de poner el nombre";
	}else{
        echo "Hola " . $nombre . " hoy es " . date('d-m-Y');
     }
    ?>

<!--<script>
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit',comprobar);
});
        function comprobar(evento){
                evento.preventDefault();
                let nombre=document.getElementById('nombre').value;
                if (nombre==""){
                        alert("Debes de escribir algo");
                        return;
                }
                this.submit();
        }
</script>-->

</body>
</html>
