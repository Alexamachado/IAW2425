function nombre() {
    var nombre = document.getElementById("nombre").value;

    if (nombre=='') {
        document.getElementById("error_n").innerHTML = "Este campo es obligatorio";
        return false;
    }
    else {
        document.getElementById("error_n").innerHTML = "";
        return true;
    }
}

function apellidos() {
    var apellidos = document.getElementById("apellidos").value;

    if (apellidos=='') {
        document.getElementById("error_a").innerHTML = "Este campo es obligatorio";
        return false;
    }
    else {
        document.getElementById("error_a").innerHTML = "";
       return true;
    }
}

function correo() {
    var correo = document.getElementById("correo").value;
	var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    if (correo=='') {
        document.getElementById("error_c").innerHTML = "Este campo es obligatorio";
        return false;
    }
    else if(validEmail.test(correo) ){
        document.getElementById("error_c").innerHTML = "";
		return true;
    }
    else {
        document.getElementById("error_c").innerHTML = "El correo electrónico es incorrecto";
        return false;
    }
}

function pin() {
    var pin1 = document.getElementById("pin1").value;
    var pin2 = document.getElementById("pin2").value;

    if (pin1.length>=8 && pin2.length>=8) {
        document.getElementById("error_p1").innerHTML = "";
        document.getElementById("error_p2").innerHTML = "";
        return true;    
    }
    else if (pin1.length<8){
        document.getElementById("error_p1").innerHTML = "La contraseña debe tener mínimo 8 dígitos";
        return false;  
    }
    else {
        document.getElementById("error_p2").innerHTML = "La contraseña debe tener mínimo 8 dígitos";
        return false;    
    }
}


function validacionpin() {
    var pin1 = document.getElementById("pin1").value;
    var pin2 = document.getElementById("pin2").value;

    if (pin1 == pin2) {
        document.getElementById("error_pines").innerHTML = "";
        return true;
    }
    else {
        document.getElementById("error_pines").innerHTML = "Los pines no coinciden";
        return false;
    }
}




function validar() { 
    nombre();
    apellidos();
    correo();
    pin();
    validacionpin();
    checkbox();

    if (nombre()===true && apellidos()===true && correo()===true && pin()===true && validacionpin()===true && checkbox()===true) {
        alert("FELICIDADES, SE HA REGISTRADO CORRECTAMENTE");
    }
}