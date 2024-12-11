function asunto(){
    let asunto= document.getElementById("asunto").value
    if (asunto==''){
     document.getElementById("error1").innerHTML = "El campo Asunto es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error1").innerHTML = ""
         return true}
 }

 function dni(){
    let dn= document.getElementById("dni").value
    if (dn==''){
     document.getElementById("error2").innerHTML = "El campo DNI/NIE es necesario para completar el formulario"
     return false
    }else if(dn!=''){
        let letra =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var cadena = document.getElementById("dni").value; //DNI completo 
        let cadenaSinEspacios = cadena.replace(" ", "");   
        let cadenaLimpia = cadenaSinEspacios.toUpperCase();
        var numero = parseInt(cadenaLimpia.substring(0,8)); //Parte numerica
        var letraUsuario = cadena [8]; //Letra escrita por el usuario
        var letraReal = letra[numero%23]; // Letra "real" del DNI calculada segun formula
        if (letraUsuario!=letraReal){  // Si no coincide letras es falso
            document.getElementById("error2").innerHTML = "DNI incorrecto"
            return false;} 
        else{
            document.getElementById("error2").innerHTML = ""
            return true;}
        }
 }

function nombre(){
   let name= document.getElementById("nombre").value
   if (name==''){
    document.getElementById("error3").innerHTML = "El campo nombre es necesario para completar el formulario"
    return false
    }else {
        document.getElementById("error3").innerHTML = ""
        return true}
}

function apellidos(){
    let apellido1 = document.getElementById("apellido1").value
    if(apellido1==''){
        document.getElementById("error4").innerHTML = "El campo apellidos es necesario para completar el formulario"
     }else {
        document.getElementById("error4").innerHTML = ""
        return true}
 }

 function fecha(){
    let fecha= document.getElementById("fecha").value
    if (fecha==''){
     document.getElementById("error5").innerHTML = "El campo fecha es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error5").innerHTML = ""
         return true}
 }

 function telefono(){
    let telefono= document.getElementById("telefono").value
    if (telefono==''){
     document.getElementById("error6").innerHTML = "El campo telefono es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error6").innerHTML = ""
         return true}
 }

 function email(){
    let email= document.getElementById("email").value
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailRegex.test(email)==false) {
        document.getElementById("error7").innerHTML = "El campo email es necesario para completar el formulario"
        return false
     }else {
        document.getElementById("error7").innerHTML = ""
        return true}
 }

 function domicilio(){
    let domicilio= document.getElementById("domicilio").value
    if (domicilio==''){
     document.getElementById("error8").innerHTML = "El campo domicilio es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error8").innerHTML = ""
         return true}
 }

 function postal(){
    let postal= document.getElementById("postal").value
    if (postal==''){
     document.getElementById("error9").innerHTML = "El campo postal es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error9").innerHTML = ""
         return true}
 }

 function municipio(){
    let municipio= document.getElementById("municipio").value
    if (municipio==''){
     document.getElementById("error10").innerHTML = "El campo municipio es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error10").innerHTML = ""
         return true}
 }

 function oficina(){
    let oficina= document.getElementById("oficina").value
    if (oficina==''){
     document.getElementById("error11").innerHTML = "El campo oficina es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error11").innerHTML = ""
         return true}
 }

 function descripcion(){
    let descripcion= document.getElementById("descripcion").value
    if (descripcion==''){
     document.getElementById("error12").innerHTML = "El campo Informacion es necesario para completar el formulario"
     return false
     }else {
         document.getElementById("error12").innerHTML = ""
         return true}
 }

 function anexo(){
   /* let anexo= document.getElementById("asunto").value
    if (asunto==''){
     document.getElementById("error13").innerHTML = "Debes rellenar el asunto"
     return false
     }else {
         document.getElementById("error13").innerHTML = ""
         return true}*/
 }


 function caja(){
    let caja = document.getElementById("caja").checked
    if (caja == false){
        document.getElementById("error15").innerHTML = "El campo Politicas es necesario para completar el formulario"
        return false
    }else{
        document.getElementById("error15").innerHTML = ""
        return true}
}

function comprobar(){
    asunto();
    nombre();
    apellidos();
    fecha();
    telefono();
    domicilio();
    municipio();
    postal();
    oficina();
    anexo();
    dni();
    email();
    descripcion();
    caja();    
}