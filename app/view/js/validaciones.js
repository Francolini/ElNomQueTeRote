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

	if(!validaVacioLogin(usuario, pass, informacion)){
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

function validaVacioLogin(usu, pass, info){
	var valido=true;

	if(usu == null || usu==""){
		valido=false;
		info+="El campo del usuario esta vacio </br>";
	}

	if(pass == null || pass == ""){
		valido=false;
		info+="El campo de la contraseña esta vacion </br>";
	}

	return valido;
}