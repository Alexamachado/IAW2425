function acierto(){
    
}

function aparececuadrado()
{
    var top = Math.random()*400;
    var left = Math.random()*300;
    var width = (Math.random()*100)+100;
    
    document.getElementById("cuadrado").style.width = width + "px";
    document.getElementById("cuadrado").style.height = width + "px";

    document.getElementById("cuadrado").style.top = top + "px";
    document.getElementById("cuadrado").style.left = left + "px";

    document.getElementById("cuadrado").style.display = "block";
}
function desapareceMensaje(){
    document.getElementById("gotit").innerHTML = ""; 
}
function aparececuadradoDespuesRetraso()
{
    setTimeout(aparececuadrado, Math.random()*2000);
}
function desapareceMensajeDespuesRetraso()
{
    setTimeout(desapareceMensaje, 2000);
}
aparececuadradoDespuesRetraso();

document.getElementById("zone").onclick = function (e)
{
    if (e.target != document.getElementById("patito"))
    {
        puntos = puntos - 1;
        document.getElementById("gotit").innerHTML = "¡Fallaste!";
        
    }
    else{
        puntos = puntos + 1;
        document.getElementById("gotit").innerHTML = "¡Acierto!";
    }
    document.getElementById("cuadrado").style.display = "none";
    document.getElementById("besttime").innerHTML = puntos; /* Establecemos los puntos */
    aparecerpatitoDespuesRetraso();
    desapareceMensajeDespuesRetraso();
}