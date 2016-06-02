<?php 

include("app/model/Canciones.class.php");

function listarCanciones(){
	$canciones=new Canciones();

	$listaCanciones = $canciones->listarCanciones();

	for ($i=0; $i < sizeof($listaCanciones["canciones"]) ; $i++) { 
		echo $listaCanciones["canciones"][$i].'<button type="button" onclick="anyadirCancion();" name="canciones[]" value="'.$listaCanciones["canciones"][$i].'">Añadir</button><br>';
		//echo $listaCanciones["artistas"][$i];
		//echo $listaCanciones["apellido"][$i];
	}
}

?>