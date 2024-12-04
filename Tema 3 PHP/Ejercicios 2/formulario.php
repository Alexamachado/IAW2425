<form action="formulario.php">
    <input type="text" name="caja" placeholder="Escribe aqui">
    <input type="submit" value="Enviar">
    
    <?php
    if (isset($_GET["caja"])){ //si tiene algo $GET
    echo 'Hola ' . htmlspecialchars($_GET["caja"]) . '!'; }
    ?>