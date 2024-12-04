<!doctype html>
<html>
<head><title> Tabla numeros</title>
<style>
       body{
              background-color: blue
       }
       ul{
              width: 500px;
              height: 500px;
              display: flex;
              justify-content: center;
              text-align: center;
              align-items: center;
       }
</style>
</head>
<body>
	<?php
       $tweets = [
              "asdsa",
              "fsdaf",
              "adsad",
              "asdsada"
       ];
       //include "funciones.php  //y metemos la funcion de abajo en este archivo 
       function mostrarTweets(){
              foreach ($tweets as $tweet){
                     echo "<div class='tweet-caja'>
                            <div class='tweet></div>    //FALTA
                            <div></div>
                     </div>"
              }
       }



mostrarTweets()
        /*$mensajes = ["Voy a verme una pelicula al cine","Hoy he ido a comer a washington","La nueva de matrix esta muy guapa",
                     "Hoy voy a comer macarrones con cebolla", "EL antonio machado es el mejor insti de sevi", "Me he comprado unos pantalones muy guapos"];
                     echo "<h1>YES TWITTER </h1>";
                     echo "<ul>";
                     foreach ($mensajes as $tweets){
                            echo "<li>$tweets</li>";
                     };
                     echo "</ul>";*/
                     
    ?>
</body>
</html>
<!-- foreach3.php. Crea un script en PHP que recorre un array de tweets y formatea 
 un documento HTML al usuario mostrando las distintas frases con una apariencia similar a la de Twitter. 
 En su ejecución define una función que genere el código necesario para mostrar el tweet.-->