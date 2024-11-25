function nombre(){
    let nombre = document.getElementById("nombre").value
    if(nombre == ''){
        document.getElementById("error1").innerHTML = "El Nombre es obligatorio"
    }else{
        document.getElementById("error1").innerHTML = ""
        return true}
}

function apellidos(){
    let apellido1 = document.getElementById("apellido1").value
    let apellido2 = document.getElementById("apellido2").value
    if(apellido1=='' && apellido2==''){
        document.getElementById("error2").innerHTML = "El Apellido es obligatorio"
        document.getElementById("error3").innerHTML = "El Apellido es obligatorio"
    }else if(apellido1==''){
        document.getElementById("error2").innerHTML = "El Apellido es obligatorio"       
        return false;
    }else if(apellido2==''){
        document.getElementById("error3").innerHTML = "El Apellido es obligatorio"
        return false;
    }else{
        document.getElementById("error2").innerHTML = ""
        document.getElementById("error3").innerHTML = ""
        return true}
}

function dni(){
    let dni = document.getElementById("dni").value
    if(dni==''){
        document.getElementById("error4").innerHTML = "El DNI es obligatorio"
        return false;
    }else{
        let letra =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        var cadena = document.getElementById("dni").value; //DNI completo 
        let cadenaSinEspacios = cadena.replace(" ", "");   
        let cadenaLimpia = cadenaSinEspacios.toUpperCase();
        var numero = parseInt(cadenaLimpia.substring(0,8)); //Parte numerica
        var letraUsuario = cadena [8]; //Letra escrita por el usuario
        var letraReal = letra[numero%23];
        if(letraUsuario!=letraReal){
            document.getElementById("error4").innerHTML = "El DNI introducido no es correcto"    
            return false;
        }else{
            document.getElementById("error4").innerHTML = ""
            return true}}
}

function email(){
    var correo = document.getElementById("email").value;
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (correo=='') {
        document.getElementById("error5").innerHTML = "Este campo es obligatorio";
        return false;
    }
    else if(validEmail.test(correo) ){
        document.getElementById("error5").innerHTML = "";
		return true;
    }
    else {
        document.getElementById("error5").innerHTML = "El correo electrónico es incorrecto";
        return false;
    }}

function contrasena(){
    let contrasena = document.getElementById("contrasena").value
    let contrasena2 = document.getElementById("contrasena2").value
    if(contrasena=='' || contrasena.length<8){
        document.getElementById("error6").innerHTML = "La contraseña es obligatoria y debe tener longitud minimas de 8 caracteres"
        return false
    }else if(contrasena!=contrasena2){
        document.getElementById("error7").innerHTML = "Las contraseñas no coinciden"
        return false;
    }else{
        document.getElementById("error6").innerHTML = ""
        document.getElementById("error7").innerHTML = ""
        return true}
}

function caja(){
    let caja = document.getElementById("caja").checked
 if(caja==false){
    document.getElementById("error8").innerHTML = "Debe aceptar la politica de privacidad"
}else{
    document.getElementById("error8").innerHTML = ""
    return true}
}

function crear(){
    nombre();
    apellidos();
    dni();
    email();
    contrasena();
    caja();
    if(nombre()===true && apellidos()===true && dni()===true && email()===true && 
        contrasena()===true && caja()===true){
        let textonombre = document.getElementById("nombre").value
        let textoapellido1 = document.getElementById("apellido1").value
        let textoapellido2 = document.getElementById("apellido2").value
        let textodni = document.getElementById("dni").value
        let nombri = textonombre.substring(0, 1);
        let apelli1 = textoapellido1.substring(0, 3);
        let apelli2 = textoapellido2.substring(0, 3);
        let dn = textodni.substring(6, 9);
        let todo = nombri + apelli1 + apelli2 + dn;
        let todominuscula = todo.toLowerCase();
        alert("El nombre de tu usuario es: " + todominuscula)
        }
 }  
