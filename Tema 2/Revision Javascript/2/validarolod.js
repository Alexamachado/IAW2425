function validar(elementos){
    let estanCorrectos = true;
    for (var i=0;i<elementos.length;i++){  //0 es el primer elemento
        document.getElementById("campo"+(i+1).toString()).innerHTML = "";  //Pone el mensaje en blanco de manera predeterminada    
        if (elementos[i].value == "" || (i==9 && !elementos[i].checked)){ //comprueba si el campo esta relleno o no, y si esta marcado o no
       // Si el campo esta vacio o (el campo es la casilla de verificacion y no esta marcada) entonces...     
            document.getElementById("campo"+(i+1).toString()).innerHTML = "El campo " + elementos[i].id + " está vacío";
            estanCorrectos = false;
        }  
    }
   if (!validarName()){ //valido correo
       document.getElementById("campo1").innerHTML = "Es necesario poner el nombre";        
        estanCorrectos = false;
    }
    if (!validarApellidos()){ //valido correo
       document.getElementById("campo2").innerHTML = "Es necesario poner los apellidos";        
        estanCorrectos = false;
    } 
    if (!validarEmail()){ //valido correo
        document.getElementById("campo3").innerHTML = "Email no válido";        
        estanCorrectos = false;
    }
    if (!validaPIN()){ //si no son validas las contraseñas, es decir la funcion es distinta de esta
    document.getElementById("campo8").innerHTML = "El PIN con requisitos de longitud o no coinciden";        
    document.getElementById("campo9").innerHTML = "El PIN no cumple con requisitos de longitud o no coinciden";
    estanCorrectos = false;
    }
    if (!validarDNI()){ //valido contraseñas
        document.getElementById("campo7").innerHTML = "DNI no valido +(12345678X)";        
        estanCorrectos = false;
        }
    return estanCorrectos;
}

function validarName(){
    let nombreOK = true
    if(document.getElementById("nombre").value=='')
        nombreOK = false
    return nombreOK;
}

function validarApellidos(){
    let apellidosOK = true
    if(document.getElementById("apellidos").value=='')
        apellidosOK = false
    return apellidosOK
}

function validarEmail(){              
	var valido;
	var emailField = document.getElementById('email');
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
	if( validEmail.test(emailField.value) ){
		valido=true;
	}else{
        valido=false;
	}
    return valido;
} 

function validaPIN(){
    let pin1 = document.getElementById("pin1").value;
    let pin2 = document.getElementById("pin2").value;
    let pinOK = true; //Cumple con los requisitos establecidos 
    let comprobar = /\d{8,8}/;
// por defecto es true 
    if (pin1.length<8 || (pin1!=pin2)){ //cuando una de las dos sea verdadera, esta mal       
    pinOK=false}
    return pinOK;
}

function validarDNI(){
    let letra =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var cadena = document.getElementById("dni").value; //DNI completo 
    let cadenaSinEspacios = cadena.replace(" ", "");   
    let cadenaLimpia = cadenaSinEspacios.toUpperCase();
    var numero = parseInt(cadenaLimpia.substring(0,8)); //Parte numerica
    var letraUsuario = cadena [8]; //Letra escrita por el usuario
    var letraReal = letra[numero%23]; // Letra "real" del DNI calculada segun formula
    var dniValido =true;
    if (letraUsuario!=letraReal)  // Si no coincide letras es falso
        dniValido = false;
    return dniValido;
}


if (estanCorrectos=true){
    textonombre = document.getElementById("nombre").value
    textoapellidos = document.getElementById("apellidos").value
    textotelefonos = document.getElementById("telefono").value
    let letrasnombres = textonombre.substring(1, 2);
    let letrasapellidos = textoapellidos.substring(1, 2);
    let letrastelefonos = textotelefonos.substring(-3, -1);
    let nombreusuario = letrasnombres + letrasapellidos + letrastelefonos;
    alert("Enorabuena su usuario ha sido creado correctamente, el nombre de su usuario es: " + nombreusuario)
}

/*function mensaje(){
    textonombre = document.getElementById("nombre").value
    textoapellidos = document.getElementById("apellidos").value
    textotelefonos = document.getElementById("telefono").value
    let letrasnombres = textonombre.substring(1, 2);
    let letrasapellidos = textoapellidos.substring(1, 2);
    let letrastelefonos = textotelefonos.substring(-3, -1);
    let nombreusuario = letrasnombres + letrasapellidos + letrastelefonos;
    alert("Enorabuena su usuario ha sido creado correctamente, el nombre de su usuario es: " + nombreusuario)
}*/


/* if($("#nombre").val()==''){
    $("#campo1").text("Rellena este campo")
}
if($("#apellidos").val()==''){
    $("#campo2").text("Rellena este campo")
}
if($("#correoelectronico").val()==''){
    $("#campo3").text("Rellena este campo")
}
if($("#direccion").val()==''){
    $("#campo4").text("Rellena este campo")
}
if($("#ciudad").val()==''){
    $("#campo5").text("Rellena este campo")
}
if($("#telefono").val()==''){
    $("#campo6").text("Rellena este campo")
}
if($("#dni").val()==''){
    $("#campo7").text("Rellena este campo")
}
if($("#pin1").val()==''){
    $("#campo8").text("Rellena este campo")
}
if($("#pin2").val()==''){
    $("#campo9").text("Rellena este campo")
} */
