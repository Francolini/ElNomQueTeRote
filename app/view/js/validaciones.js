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

	if(!validaContraseñasVacias(pass, repPass, informacion)){
		validado=false;
	}

	if(!validaUsuario(usuario, informacion)){
		validado=false;
	}

	if(validado){
		document.getElementById("registro").submit();	
	}

}


function validaLogin(){
	var validado=true;
	var informacion=document.getElementById("informacion");
	informacion.innerHTML="";
	var usuario=document.getElementById("usuario").value;
	var pass=document.getElementById("pass").value;

	if(!validaContraseñaVacia(pass, informacion)){
		validado=false;
	}

	if(!validaUsuario(usuario, informacion)){
		validado=false;
	}

	if(validado){
		document.getElementById("registro").submit();	
	}

}

function validaContraseñasIguales(pass, repPass, info){
	if(pass==repPass){
		return true;
	}

	info.innerHTML+="Las contraseñas no coinciden. </br>";

	return false;
}

function validaContraseñasVacias(pass, repPass, info){
	if(pass!="" || repPass!=""){
		return true;
	}

	info.innerHTML+="Los campos de contraseña y el de repetir contraseñas no deben estar vacios. </br>";

	return false;
}

function validaContraseñaVacia(pass, info){
	if(pass!=""){
		return true;
	}

	info.innerHTML+="El campo de Contraseña está vacio. </br>";

	return false;
}

function validaUsuario(usu, info){
	var condicion=/^[a-zA-Z][a-zA-Z0-9-_\.]{3,20}$/;

	if(usu.match(condicion)){
		return true;
	}

	info.innerHTML+="El usuario debe contener entre 4 y 19 caracteres. </br>";

	return false;
}