function comprobar(){
    let name= document.getElementById("nombre").value
    let apellido1 = document.getElementById("apellido1").value
    let apellido2 = document.getElementById("apellido2").value
    let dni= document.getElementById("dni").value
    let email= document.getElementById("email").value
    let password1= document.getElementById("password1").value
    let password2= document.getElementById("password2").value
    let caja = document.getElementById("caja").checked
    let AllOk = true
    
    // Limpia los mensajes de error
    var errorMessages = document.querySelectorAll(".error"); //document.getElementsByClassName("error")
    for (var i = 0; i < errorMessages.length; i++) {
        errorMessages[i].innerHTML = "";
    }
        if (name==''){
        document.getElementById("campo1").innerHTML = "Debes rellenar el nombre"
        AllOk = false
        }
        if(apellido1=='' || apellido2==''){
            AllOk = false
            if(apellido1=='' && apellido2==''){
                document.getElementById("campo2").innerHTML = "Los apellidos son obligatorios"
                document.getElementById("campo3").innerHTML = "Los apellidos son obligatorios"
            }else if (apellido1==''){
                document.getElementById("campo2").innerHTML = "Debes rellenar el apellido"
            }else if (apellido2==''){
            document.getElementById("campo3").innerHTML = "Debes rellenar el segundo apellido"
            }
        }
        if (dni==''){
            AllOk = false
            document.getElementById("campo4").innerHTML = "Debes rellenar el dni"
            }else if (!comprobardni()){
                document.getElementById("campo4").innerHTML = "DNI incorrecto burto"
                AllOk = false
        }
        if (email==''){
            AllOk = false
            document.getElementById("campo5").innerHTML = "Debes rellenar el email"
            }else if (!comprobaremail()){
                document.getElementById("campo5").innerHTML = "El email no es valido"
                AllOk = false
            }
        if (password1=='' || password1!=password2 || password1.length<8){
            AllOk = false
            if (password1==''){
                document.getElementById("campo6").innerHTML = "Debes rellenar la contraseña"
            }else if(password1!=password2 || password1.length<8){
                document.getElementById("campo6").innerHTML = "Las contraseñas deben coincidir y tener una longitud minima de 8 digitos"
                document.getElementById("campo7").innerHTML = "Las contraseñas deben coincidir y tener una longitud minima de 8 digitos"
            }
        }
        if (caja == false){
            document.getElementById("campo8").innerHTML = "Debes aceptar la politica de la empresa"
            AllOk = false
        }


        if (AllOk){
            let textonombre = document.getElementById("nombre").value
            let textoapellido1 = document.getElementById("apellido1").value
            let textoapellido2 = document.getElementById("apellido2").value
            let textodni = document.getElementById("dni").value
            let nombre = textonombre.substring(0,1)
            let apellido1 = textoapellido1.substring(0,3)
            let apellido2 = textoapellido2.substring(0,3)
            let dni = textodni.substring(6)
            let todo = nombre + apellido1 + apellido2 + dni
            alert(todo)
        }
    }

 function comprobardni(){
        let letra =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var cadena = document.getElementById("dni").value; //DNI completo 
        let cadenaSinEspacios = cadena.replace(" ", "");   
        let cadenaLimpia = cadenaSinEspacios.toUpperCase();
        var numero = parseInt(cadenaLimpia.substring(0,8)); //Parte numerica
        var letraUsuario = cadena [8]; //Letra escrita por el usuario
        var letraReal = letra[numero%23]; // Letra "real" del DNI calculada segun formula
        if (letraUsuario!=letraReal){return false;} // Si no coincide letras es falso 
        else{return true;}
        }
 
 function comprobaremail(){
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let email= document.getElementById("email").value;
     if (emailRegex.test(email)==false) {return false}
     else {return true}
 }