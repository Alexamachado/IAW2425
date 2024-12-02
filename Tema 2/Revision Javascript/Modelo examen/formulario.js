function nombre(){
   let name= document.getElementById("nombre").value
   if (name==''){
    document.getElementById("error1").innerHTML = "Debes rellenar el nombre"
    return false
    }else {return true}
}

function apellidos(){
    let apellido1 = document.getElementById("apellido1").value
    let apellido2 = document.getElementById("apellido2").value
    if (apellido1==''){
     document.getElementById("error2").innerHTML = "Debes rellenar el apellido"
     return false
    }else if (apellido1!=apellido2 && apellido1!=''){
      document.getElementById("error2").innerHTML = "Los apellidos no coinciden"
      document.getElementById("error3").innerHTML = "Los apellidos no coinciden"
     }else {return true}
 }

 function dni(){
    let dn= document.getElementById("dni").value
    var dniRegex = /^[0-9A-Z]{8}$/;
    if (dn==''){
     document.getElementById("error4").innerHTML = "Debes rellenar el dni"
     return false
    }else if (dniRegex.test(dn)==false) {
        document.getElementById("error4").innerHTML = "El dni introducido no es correcto"
        return false
    }else {return true}
 }

 function email(){
    let email= document.getElementById("email").value
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email==''){
     document.getElementById("error5").innerHTML = "Debes rellenar el email"
     return false
    }else if (emailRegex.test(email)==false) {
        document.getElementById("error5").innerHTML = "El email no es valido"
        return false
     }else {return true}
 }

 function contrasena(){
    let password1= document.getElementById("password1").value
    let password2= document.getElementById("password2").value
    if (password1==''){
     document.getElementById("error6").innerHTML = "Debes rellenar la contraseña"
     return false
     }else {return true}
 }


function comprobar(){
    nombre();
}