<!-- Creación cookie normal y conmatriz de datos -->

<?php
setcookie("nombre", "Pepito Conejo");
?>

<?php
setcookie("datos[nombre]", "Pepito");
setcookie("datos[apellidos]", "Conejo");
?>

Es muy importante que los nombres de las cookies no coincidan con los nombres 
de controles de los formularios, porque PHP incluye los valores de las cookies 
en la matriz $_REQUEST. Es decir, que si el nombre de una cookie coincide con 
el nombre de un control, en $_REQUEST sólo se guardará el valor de la cookie, 
no el del control.

<!-- Expiración cookie -->

<?php
setcookie("nombre", "Pepito Conejo", time() + 60);  // Esta cookie se borrará un minuto después de crearla.
?>

<!-- Modificar cookie !-->
 Para modificar una cookie ya existente, simplemente se debe 
 volver a crear la cookie con el nuevo valor.

<!-- Borrar cookie !-->
<?php
setcookie("nombre", "Pepito Conejo", time() - 60);  // Esta cookie se borrará inmediatamente.
?>
    Si queremos borrar el valor almacenado
<?php
setcookie("nombre");  // Esta cookie no se borra, pero no guardará ningún valor.
?>

<!-- utilizacion cookie
 Cuando el navegador solicita una página PHP a un servidor (un dominio) que 
 ha guardado previamente cookies en ese ordenador, el navegador incluye en 
 la cabecera de la petición HTTP todas las cookies (el nombre y el valor) 
 creadas anteriormente por ese servidor.

El programa PHP recibe los nombres y valores de las cookies y se 
guardan automáticamente en la matriz $_COOKIE.

El ejemplo siguiente saluda al usuario por su nombre si el nombre del 
usuario estaba guardado en una cookie. -->

<?php
if (isset($_COOKIE["nombre"])) {
    print "<p>Su nombre es $_COOKIE[nombre]</p>\n";
} else {
    print "<p>No sé su nombre.</p>\n";
}
?>

<?php
if (isset($_COOKIE["datos"]["nombre"]) && isset($_COOKIE["datos"]["apellidos"])) {
    print "<p>Su nombre es " . $_COOKIE["datos"]["nombre"] . " " . $_COOKIE["datos"]["apellidos"] . "</p>\n";
} else {
    print "<p>No sé su nombre.</p>\n";
}
?>

<!-- Importante

es importante el orden en que se realiza el envío y la creación de cookies, 
así como su disponibilidad en $_COOKIES:

  - cuando una página pide al navegador que cree una cookie, el valor 
    de la cookie no está disponible en $_COOKIE en esa página.
  - el valor de la cookie estará disponible en $_COOKIE en páginas posteriores, 
    cuando el navegador las pida y envíe el valor de la cookie en la petición.-->

<?php
setcookie("nombre", "Pepito Conejo");

if (isset($_COOKIE["nombre"])) {
    print "<p>Su nombre es $_COOKIE[nombre]</p>\n";
} else {
    print "<p>No sé su nombre.</p>\n";
}
?>

La primera vez que se ejecuta este programa, ocurren las siguientes cosas en este orden:

  - el navegador pide la página, pero no envía con la petición el valor de ninguna 
    cookie, porque la cookie todavía no existe
  - el servidor envía la página:
        en la cabecera de respuesta, el servidor incluye la petición de creación 
        de la cookie.
        en la página escribe "No sé su nombre" porque no ha recibido ninguna 
        cookie del navegador.

La segunda vez (y las siguientes) que se ejecuta este programa, ocurren las siguientes cosas en este orden:

  - el navegador pide la página y envía con la petición el valor de la cookie "nombre".
  - el servidor envía la página:
        en la cabecera de respuesta, el servidor incluye la petición de creación 
        de la cookie (como es el mismo valor, la cookie se queda igual).
        en la página escribe "Su nombre es Pepito Conejo" porque ha recibido 
        la cookie del navegador.

<!-- La función setcookie() puede tener hasta siete argumentos: 
 setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp)

 $nombre
    Establece el nombre de la cookie.
$valor
    Establece el valor que guarda la cookie
$expiracion
    Establece el momento en que se borrará la cookie, expresado como tiempo Unix. 
    Por ello, normalmente se utiliza la función time() (que indica el momento 
    actual como tiempo Unix) más la duración en segundos que queremos que tenga la cookie 
$ruta
    Establece los directorios del dominio a los que se enviará posteriormente la cookie. 
    Es decir, si el navegador solicita una página incluida en esta ruta, el 
    navegador enviará la cookie en la petición, si no está incluida, no enviará el valor.
     Si se indica "/", se enviará a cualquier página del dominio, si no se indica nada, 
     la ruta es la de la página que crea la cookie.
$dominio
    Establece los subdominios del dominio a los que se enviará posteriormente 
    la cookie (www.example.com, subdominio.example.com, etc.
$seguridad
    Establece si solamente se envía bajo conexiones seguras (https) o no, 
    según tome el valor true o false.
$solohttp
    Establece si la cookie está accesible únicamente al servidor y 
    no al navegador (mediante Javascript u otros lenguajes), según 
    tome el valor true o false.