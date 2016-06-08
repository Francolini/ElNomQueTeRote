<?php 
//Incluimos Canciones.class.php ya que estamos en el controlador de canciones
include("app/model/Canciones.class.php");

//La funcion listarCanciones(), como su nombre dice, lista las canciones, mediante un "for" y con la etiqueta "opction" para cada cancion
function listarCanciones(){
	$canciones=new Canciones();//Se crea variable canciones

	$listaCanciones = $canciones->listarCanciones(); //Se devuelve un array de canciones desde el modelo de canciones, el Canciones.class.php
	
	for ($i=0; $i < sizeof($listaCanciones["canciones"]) ; $i++) { //para cada cancion hace un echo
		echo '<option class="opcion" value="'.$listaCanciones["idCanciones"][$i].'" > '.$listaCanciones["canciones"][$i].'  -  '.$listaCanciones["artistas"][$i].'  -  '.$listaCanciones["apellido"][$i].'</option>';
	}
}

//La funcion addSongs() simplemente añade las canciones favoritas que el usuario elige
function addSongs(){
	$cancion = new Canciones();

	//Para añadir las canciones se llama al metodo anyadirCancionesUsuario(), el cual le pasaremos la id del usuario logueado mas la cancion que ha elegido
	$cancion->anyadirCancionesUsuario($_SESSION["idCliente"], $_POST["listaCanciones"]);
}

//Esta funcion hace un echo de la lista de canciones de cada usuario en su pagina principal
function listarCancionesUsuario(){
	$cancion = new Canciones();
	$listaCanciones = $cancion->listarCancionesUsuario($_SESSION["idCliente"]);

	//Si la funcion le devuelve un false avisa al usuario de que no tiene canciones favoritas y que elija unas cuantas
	if(!$listaCanciones){
		echo "<h1> No tienes canciones! Elige tus canciones favoritas.</h1>";
	}else{ //Si, en cambio, le devuelve el array, hara un listado de todas las canciones que el usuario ha elegido como favoritas
		$lista='<div class="listaCanciones">';
			for ($i=0; $i < sizeof($listaCanciones["cancionesUsuario"]) ; $i++) {
				$lista.='<form action="index.php?action=borrarCancion&id='.$listaCanciones["idCanciones"][$i].'" method="post")>';
				$lista.='<div class="cancion">'.$listaCanciones["cancionesUsuario"][$i].'  -  '.$listaCanciones["artistas"][$i].'  -  '.$listaCanciones["apellido"][$i].'<button class="delButton" type="submit" name="borrar">Borrar</button></div>';
				$lista.='</form>';
			}
		$lista.='</div>';
		
		echo $lista;

	}
	
}

//Esta funcion borra las candiones que el usuario tiene como favoritas y ya no quiere
function borrarCancion($idCancion){
	$cancion = new Canciones();
	$cancion->borrarCancion($_SESSION["idCliente"], $idCancion);
}

?>