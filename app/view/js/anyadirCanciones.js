
function anyadirCanciones(){
	
	var select = document.getElementById("select");
	
	var cancion = document.createElement("div");
	cancion.setAttribute("onclick", "this.remove();");
	cancion.innerHTML = select.options[select.selectedIndex].text;

	var oculto = document.createElement("input");
	oculto.setAttribute("type", "hidden");
	oculto.setAttribute("value", select.value);
	oculto.setAttribute("name", "listaCanciones[]");

	cancion.appendChild(oculto);

	var listaCanciones = document.getElementById("cancionesUsuario");
	listaCanciones.appendChild(cancion);
}