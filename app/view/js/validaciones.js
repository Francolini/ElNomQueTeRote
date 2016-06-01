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

	info.innerHTML+="LAS CONTRASEÑAS NO COINCIDEN. </br>";

	return false;
}

function validaContraseñasVacias(pass, repPass, info){
	if(pass!="" || repPass!=""){
		return true;
	}

	info.innerHTML+="LOS CAMPOS DE CONTRASEÑA NO DEBEN ESTAR VACIOS. </br>";

	return false;
}

function validaContraseñaVacia(pass, info){
	if(pass!=""){
		return true;
	}

	info.innerHTML+="EL CAMPO DE CONTRASEÑA ESTÁ VACIO. </br>";

	return false;
}

function validaUsuario(usu, info){
	var condicion=/^[a-zA-Z][a-zA-Z0-9-_\.]{2,21}$/;

	if(usu.match(condicion)){
		return true;
	}

	info.innerHTML+="EL USUARIO DEBE CONTENER ENTRE 3 Y 20 CARACTERES. </br>";

	return false;
}