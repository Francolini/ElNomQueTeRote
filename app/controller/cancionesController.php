<?php 

include("app/model/Canciones.class.php");

function listarCanciones(){
	$canciones=new Canciones();
	echo $canciones->listarCanciones()[0];
}
?>