function comprobar(){
   let asunto = document.getElementById("asunto").value
   let dni = document.getElementById("dni").value
   let nombre = document.getElementById("nombre").value
   let apellido = document.getElementById("apellido1").value
   let fecha = document.getElementById("fecha").value
   let telefono = document.getElementById("telefono").value
   let email = document.getElementById("correo").value
   let domicilio = document.getElementById("domicilio").value
   let postal = document.getElementById("postal").value
   let municipio = document.getElementById("municipio").value
   let oficina = document.getElementById("oficina").value
   let requerido = document.getElementById("requerido").value
   let caja = document.getElementById("asunto").checked

    var errores = document.querySelectorAll(".error"); //document.getElementsByClassName("error")
    for (var i = 0; i < errores.length; i++) {
        errores[i].innerHTML = "";}

    if(asunto ==""){
        document.getElementById("campo1").innerHTML= "El campo Asunto es necesario para completar el formulario"
        allok = false
    }if(dni ==""){
        document.getElementById("campo2").innerHTML= "El campo DNI es necesario para completar el formulario"
        allok = false
    }else if(!validardni()){
        document.getElementById("campo2").innerHTML= "El DNI introducido es incorrecto"
        allok = false
    }if(nombre ==""){
        document.getElementById("campo3").innerHTML= "El campo Nombre es necesario para completar el formulario"
        allok = false
    }if(apellido ==""){
        document.getElementById("campo4").innerHTML= "El campo Apellido es necesario para completar el formulario"
        allok = false
    }if(fecha ==""){
        document.getElementById("campo6").innerHTML= "El campo Fecha es necesario para completar el formulario"
        allok = false
    }if(telefono ==""){
        document.getElementById("campo7").innerHTML= "El campo Telefono es necesario para completar el formulario"
        allok = false
    }if(!validaremail()){
        document.getElementById("campo8").innerHTML= "Debes de introducir un correo valido"
        allok = false
    }if(domicilio==""){
        document.getElementById("campo9").innerHTML= "El campo Asunto es necesario para completar el formulario"
        allok = false
    }if(postal ==""){
        document.getElementById("campo10").innerHTML= "El campo Codigo Postal es necesario para completar el formulario"
        allok = false
    }if(municipio ==""){
        document.getElementById("campo11").innerHTML= "El campo Municipio es necesario para completar el formulario"
        allok = false
    }if(oficina ==""){
        document.getElementById("campo12").innerHTML= "El campo Oficina es necesario para completar el formulario"
        allok = false
    }if(requerido ==""){
        document.getElementById("campo13").innerHTML= "El campo Información requerida es necesario para completar el formulario"
        allok = false
    }if(!caja){
        document.getElementById("campo16").innerHTML= "El campo Politica de datos es necesario para completar el formulario"
        allok = false
    }

    if (allok){

        
    }
} 

    function validardni(){
        let letra =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var cadena = document.getElementById("dni").value; //DNI completo 
        let cadenaSinEspacios = cadena.replace(" ", "");   
        let cadenaLimpia = cadenaSinEspacios.toUpperCase();
        var numero = parseInt(cadenaLimpia.substring(0,8)); //Parte numerica
        var letraUsuario = cadena [8]; //Letra escrita por el usuario
        var letraReal = letra[numero%23]; // Letra "real" del DNI calculada segun formula
        if (letraUsuario!=letraReal){return false;} 
        else{return true;}
        }    


    
    function validaremail(){
        var correo = document.getElementById("correo").value;
        var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
        if(correo == ""){return true}
        else if(!validEmail.test(correo) ){return false;}
        else {return true;}
    }
    
    function limitearchivo(){
        fila1 = document.getElementById("anexo1")
        fila2 = document.getElementById("anexo2")
        /*
        const uploadField = document.getElementById("file");

        uploadField.onchange = function() {
              if(this.files[0].size > 2097152) {
                alert("File is too big!");
                this.value = "";
            }
        };
        */
        if(){}
        
    }