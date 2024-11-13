$(document).ready(function () {
    $("#btn-aumentar").click(function(){
        $("#encabezado,.pares").css({"font-size":"10%","color": "red"});
    });
    $("#btn-disminuir").click(function(){
        $("#encabezado,.pares").css({"font-size":"10%","color": "blue"});
    });
});