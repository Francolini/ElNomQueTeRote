<?php 
include_once("app/model/Database.class.php");
class Canciones extends Database{

	public function listarCanciones(){
		$consulta="SELECT c.nombre, a.Nombre, a.apellido, c.idCancion  FROM canciones c, artistas a WHERE c.idArtista=a.idArtista;";
		$canciones = $this->consulta($consulta);
		
		while($cancion = mysqli_fetch_object($canciones)) {
			$cancionesArray[] = $cancion->nombre;
			$artistas[] = $cancion->Nombre;
			$apellidoArtista[] = $cancion->apellido;
			$idCancion[] = $cancion->idCancion;
		}

		return array("canciones" => $cancionesArray, "artistas" => $artistas, "apellido" => $apellidoArtista, "idCanciones" => $idCancion);
	}

	public function anyadirCancionesUsuario($id, $lista){
		for($i = 0; $i < sizeof($lista); $i++){
			$insert = "INSERT INTO canciones_clientes VALUES('$id', '$lista[$i]');";
			$this->consulta($insert);
		}

		header("Location: index.php?page=indexUser");
	}
}
?>