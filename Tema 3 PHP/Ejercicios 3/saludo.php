
<form action="saludo.php" method="POST">
    <label for="">Escribe tu nombre</label>
    <input type="text" name="nombre">
    <input type="submit" value="Enviar">
</form>
<?php
    if (isset($_POST["nombre"])){   //Con Get se lo lleva
        echo "Hola " . htmlspecialchars($_POST["nombre"]) . " hoy es " . date("d/m/Y");
    }

?>



<!-- saludo.php. Crea un formulario con una simple caja de texto para introducir 
 tu nombre y un botón. Al enviar el formulario el servidor debe reflejar la 
 entrada de datos con un saludo e indicar la fecha: “Hola Ana hoy es 19/12/22”. -->