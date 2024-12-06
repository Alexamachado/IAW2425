function nombre(){
   let name= document.getElementById("nombre").value
   if (name==''){
    document.getElementById("error1").innerHTML = "Debes rellenar el nombre"
    return false
    }else {
        document.getElementById("error1").innerHTML = ""
        return true}
}

function apellidos(){
    let apellido1 = document.getElementById("apellido1").value
    let apellido2 = document.getElementById("apellido2").value
    if(apellido1=='' && apellido2==''){
        document.getElementById("error2").innerHTML = "Los apellidos son obligatorios"
        document.getElementById("error3").innerHTML = "Los apellidos son obligatorios"
    }else if (apellido1==''){
     document.getElementById("error2").innerHTML = "Debes rellenar el apellido"
     return false
    }else if (apellido2==''){
      document.getElementById("error3").innerHTML = "Debes rellenar el segundo apellido"
      return false
     }else {
        document.getElementById("error2").innerHTML = ""
        document.getElementById("error3").innerHTML = ""
        return true}
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
    }else {
        document.getElementById("error4").innerHTML = ""
        return true}
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
     }else {
        document.getElementById("error5").innerHTML = ""
        return true}
 }

 function contrasena(){
    let password1= document.getElementById("password1").value
    let password2= document.getElementById("password2").value
    if (password1==''){
     document.getElementById("error6").innerHTML = "Debes rellenar la contraseña"
     return false
     }else if(password1!=password2 || password1.length<8){
        document.getElementById("error6").innerHTML = "Las contraseñas deben coincidir y tener una longitud minima de 8 digitos"
        document.getElementById("error7").innerHTML = "Las contraseñas deben coincidir y tener una longitud minima de 8 digitos"
     }
     else {
        document.getElementById("error6").innerHTML = ""
        document.getElementById("error7").innerHTML = ""
        return true}
 }

 function caja(){
    let caja = document.getElementById("caja").value
    if (caja.checked == false){
        document.getElementById("error8").innerHTML = "Debes aceptar la politica de la empresa"
        return false
    }else{
        document.getElementById("error8").innerHTML = ""
        return true}
}

function comprobar(){
    nombre();
    apellidos();
    dni();
    email();
    contrasena();
    caja();
    if(nombre()==true && apellidos()==true && dni()==true && email()==true 
        && contrasena()==true && caja()==true){
            let name= document.getElementById("nombre").value
            let apellido1 = document.getElementById("apellido1").value
            let apellido2 = document.getElementById("apellido2").value
        }else{
            alert("Debes rellenar los campos obligatorios")
        }
    
}