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

function listarCancionesUsuario(){
	$cancion = new Canciones();
	$listaCanciones = $cancion->listarCancionesUsuario($_SESSION["idCliente"]);

	if(!$listaCanciones){
		echo "<h1> No tienes canciones! Elige tus canciones favoritas.</h1>";
	}else{
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

function borrarCancion($idCancion){
	$cancion = new Canciones();
	$cancion->borrarCancion($_SESSION["idCliente"], $idCancion);
}

?>