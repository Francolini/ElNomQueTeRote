
function anyadirCanciones(i, bot){

	var fila = document.getElementById(i);
	var numFila = fila.id;
	var boton = bot;

	boton.remove();

	var cancionesUsuario = document.getElementById("cancionesUsuario");

	var tabla = document.createElement("table");
	tabla.setAttribute("id", "tablaCanciones");
	var tupla = document.createElement("tr");
	var campo = document.createElement("td");
	tabla.appendChild(tupla);
	tupla.appendChild(campo);

	campo.innerHTML = fila.value;

	fila.remove();

}

function borrarCancionFavorita(numBorrados){
	
	var filaId = document.getElementById(numBorrados);



	filaId.remove();
	
}