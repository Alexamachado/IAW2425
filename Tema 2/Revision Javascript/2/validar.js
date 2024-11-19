
function nombre(){
    let nombri = document.getElementById("nombre").value
    if(nombri==''){
        document.getElementById("campo1").innerHTML = "Hace falta poner nombre"
        return false;
    }else{
        document.getElementById("campo1").innerHTML = ""
        return true}}

function apellidos(){
    let apelli = document.getElementById("apellidos").value
    if(apelli==''){
        document.getElementById("campo2").innerHTML = "Hace falta poner apellido"
    return false
    }else{
        document.getElementById("campo2").innerHTML = ""
        return true}}

function email(){
    var correo = document.getElementById("email").value;
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (correo=='') {
        document.getElementById("campo3").innerHTML = "Este campo es obligatorio";
        return false;
    }
    else if(validEmail.test(correo) ){
        document.getElementById("campo3").innerHTML = "";
		return true;
    }
    else {
        document.getElementById("campo3").innerHTML = "El correo electrónico es incorrecto";
        return false;
    }
}

function direccion(){
    let direci = document.getElementById("direccion").value
    if(direci==''){
        document.getElementById("campo4").innerHTML = "Hace falta poner la direccion"
    return false
    }else{
        document.getElementById("campo4").innerHTML = ""
        return true}
}

function ciudad(){
    let ciudi = document.getElementById("ciudad").value
    if(ciudi==''){
        document.getElementById("campo5").innerHTML = "Hace falta poner la ciudad"
    return false
    }else{
        document.getElementById("campo5").innerHTML = ""
        return true}
}

function telefono(){
    let telefoni = document.getElementById("telefono").value
    if(telefoni==''){
        document.getElementById("campo6").innerHTML = "Hace falta poner la telefono"
    return false
    }else if(isNaN(telefoni) || telefoni.length!= 9 ){
        document.getElementById("campo6").innerHTML = "El telefono no existe"
    return false
    }
    else{
        document.getElementById("campo6").innerHTML = ""
        return true}
}

function DNI(){
    let dn = document.getElementById("dni").value
    if(dn==''){
        document.getElementById("campo7").innerHTML = "Hace falta poner el dni"
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
        document.getElementById("campo7").innerHTML = "DNI incorrecto burto"
        return false;} 
    else{
        document.getElementById("campo7").innerHTML = ""
        return true;}
    }}

function PIN(){
    let pin1 = document.getElementById("pin1").value
    let pin2 = document.getElementById("pin2").value
    //let comprobar = /\d{8,8}/;
    if(pin1==''){
        document.getElementById("campo8").innerHTML = "Hace falta poner el primer pin"
        document.getElementById("campo9").innerHTML = "Hace falta poner el primer pin"
    return false
    }else if(pin1!=pin2 || isNaN(pin1) || pin1.length != 8){
        document.getElementById("campo8").innerHTML = "Los campos no coinciden o no se cumplen los requisitos"
        document.getElementById("campo9").innerHTML = "Los campos no coinciden o no se cumplen los requisitos"
    return false
    }else{
        document.getElementById("campo8").innerHTML = ""
        document.getElementById("campo9").innerHTML = ""
        return true}
}
function validar(){
    nombre();
    apellidos();
    email();
    direccion();
    ciudad();
    telefono();
    DNI();
    PIN();
    if(nombre()===true && apellidos()===true && email()===true && direccion()===true,
    ciudad()===true && telefono()===true && DNI()===true && PIN()===true){
        let textonombre = document.getElementById("nombre").value
        let textoapellidos = document.getElementById("apellidos").value
        let textotelefonos = document.getElementById("telefono").value
        let letrasnombres = textonombre.substring(0, 2);
        let letrasapellidos = textoapellidos.substring(0, 2);
        let letrastelefonos = textotelefonos.substring(6, 9);
        let nombreusuario = letrasnombres + letrasapellidos + letrastelefonos;
        alert("Enorabuena su usuario ha sido creado correctamente, el nombre de su usuario es: " + nombreusuario)
    }
}