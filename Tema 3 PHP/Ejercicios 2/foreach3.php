<!doctype html>
<html>
<head><title> Foreach3</title>
<style>
       body{
              background-color: blue
       }
       .tweet-caja {
            width: 100%;
            max-width: 500px;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #e1e8ed;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
            font-family: Arial, sans-serif;
        }
        .tweet-header {
            font-size: 14px;
            color: #657786;
        }
        .tweet-content {
            font-size: 16px;
            color: #14171a; 
        }
       /*ul{
              width: 500px;
              height: 500px;
              display: flex;
              justify-content: center;
              text-align: center;
              align-items: center;
       }*/
</style>
</head>
<body>
	<?php
       $tweets = [
              "Este es el primer tweet",
              "Segundo tweet",
              "Tercer tweet",
              "Cuarto tweet"
       ];
       //include "funciones.php  //y metemos la funcion de abajo en este archivo 
       function mostrarTweets(){    //mostrarTweets($tweets)
              foreach ($tweets as $tweet){
                     echo "<div class='tweet-caja'>
                            <div class='tweet-header'>Usuario @ejemplo</div>
                            <div class='tweet-content'>$tweet</div>                 
                     </div>";
              }
       }
                     mostrarTweets(); //mostrarTweets($tweets)


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