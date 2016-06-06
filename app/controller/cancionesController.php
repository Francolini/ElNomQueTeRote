<?php 

include("app/model/Canciones.class.php");

function listarCanciones(){
	$canciones=new Canciones();

	$listaCanciones = $canciones->listarCanciones();
	
	for ($i=0; $i < sizeof($listaCanciones["canciones"]) ; $i++) {
		echo '<option class="opcion" value="'.$listaCanciones["idCanciones"][$i].'" > '.$listaCanciones["canciones"][$i].'  -  '.$listaCanciones["artistas"][$i].'  -  '.$listaCanciones["apellido"][$i].'</option>';
	}
}

function addSongs(){
	$cancion = new Canciones();
	$cancion->anyadirCancionesUsuario($_SESSION["idCliente"], $_POST["listaCanciones"]);
}

?>