
function anyadirCanciones(){
	
	//Coge el select
	var select = document.getElementById("select");
	
	//Crea un div con el atributo onclick="this.remove()" y el atributo class 
	var cancion = document.createElement("div");
	cancion.setAttribute("onclick", "this.remove();");
	cancion.setAttribute("class", "divOculto");
	cancion.setAttribute("class", "cancion");
	//Ecribe el texto de la cancion dentro de ese div
	cancion.innerHTML = select.options[select.selectedIndex].text;

	//se crea un input con los atributos type="hidden", value, con el valor del select, i name con los datos de la cancion
	var oculto = document.createElement("input");
	oculto.setAttribute("type", "hidden");
	oculto.setAttribute("value", select.value);
	oculto.setAttribute("name", "listaCanciones[]");

	//Se le añade este input al div creado
	cancion.appendChild(oculto);

	//Se coge el div donde se añadira cada cancion (div) con su input
	var listaCanciones = document.getElementById("cancionesUsuario");
	//Se le añade todo al div
	listaCanciones.appendChild(cancion);
}