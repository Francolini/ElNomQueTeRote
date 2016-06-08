/* validaciones :D: */

function validaRegistro(){
	var validado=true;
	var informacion=document.getElementById("informacion");
	informacion.innerHTML="";
	var usuario=document.getElementById("usuario").value;
	var pass=document.getElementById("pass").value;
	var repPass=document.getElementById("repPass").value;

	if(!validaContraseñasIguales(pass, repPass, informacion)){
		validado=false;
	}
	
	if(!validaUsuario(usuario, informacion)){
		validado=false;
	}

	return validado;

}


function validaLogin(){
	var validado=true;
	var informacion=document.getElementById("informacion");
	informacion.innerHTML="";
	var usuario=document.getElementById("usuario").value;
	var pass=document.getElementById("pass").value;

	if(!validaUsuario(usuario, informacion)){
		validado=false;
	}

	return validado;

}

function validaContraseñasIguales(pass, repPass, info){
	if(pass==repPass){
		return true;
	}
	
	info.innerHTML+="Las contraseñas no coinciden. </br>";

	return false;
}

function validaUsuario(usu, info){
	var condicion=/^\w{5,20}$/;

	if(usu.match(condicion)){
		return true;
	}

	info.innerHTML+="El campo de usuario debe contener entre 5 y 20 caracteres. </br>";

	return false;
}