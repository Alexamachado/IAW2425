$(document).ready(function () {
    var tamano=100
    $("#btn-aumentar").click(function(){
        tamano +=20;
        $("#encabezado,.pares").css({"font-size": + tamano +"%","color": "red"});
    });
    $("#btn-disminuir").click(function(){
        tamano -=20;
        $("#encabezado,.pares").css({"font-size": + tamano +"%","color": "blue"});
    });
});

function aumentartamano(){
    tamano+=25;
    document.getElementById("parrafo").style.fontSize = tamano+"%"}