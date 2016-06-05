<?php 

include("app/model/Canciones.class.php");

function listarCanciones(){
	$canciones=new Canciones();

	$listaCanciones = $canciones->listarCanciones();
	$tabla = '<table class="tabla">';
	$tabla .= '<tr>';
	$tabla .= '<td>Nombre de la cancion</td>';
	$tabla .= '<td>Nombre del artista</td>';
	$tabla .= '<td>Apellido del artista</td>';
	$tabla .= '</tr>';
	for ($i=0; $i < sizeof($listaCanciones["canciones"]) ; $i++) {
		$tabla .= '<tr id="'.$i.'">';

		$tabla .= '<td id="ncan'.$i.'">'.$listaCanciones["canciones"][$i]."</td>";
		$tabla .= '<td id="nart'.$i.'">'.$listaCanciones["artistas"][$i]."</td>";
		$tabla .= '<td id="nape'.$i.'">'.$listaCanciones["apellido"][$i]."</td>";
		$tabla .= "<td>".'<button data-idCancion="'.$listaCanciones["idCanciones"][$i].' id="bot'.$i.'" onclick="anyadirCanciones('.$i.', this);">Añadir</button>'.'</td>';
		$tabla .= "</tr>";
	}
	$tabla .= "</table>";
	return $tabla;
}

?>