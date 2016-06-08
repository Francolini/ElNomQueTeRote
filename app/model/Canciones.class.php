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

	public function listarCancionesUsuario($id){
		$cancion="SELECT DISTINCT c.nombre, a.Nombre, a.apellido, c.idCancion  FROM canciones c, artistas a, canciones_clientes cc WHERE c.idArtista=a.idArtista AND cc.idCliente='$id' AND c.idCancion=cc.idCancion;";

		$canciones = $this->consulta($cancion);

		while($cancionUsuario = mysqli_fetch_object($canciones)) {
			$cancionesArray[] = $cancionUsuario->nombre;
			$artistas[] = $cancionUsuario->Nombre;
			$apellidoArtista[] = $cancionUsuario->apellido;
			$idCancion[] = $cancionUsuario->idCancion;
		}
			
		if(isset($cancionesArray)){

			return array("cancionesUsuario" => $cancionesArray, "artistas" => $artistas, "apellido" => $apellidoArtista, "idCanciones" => $idCancion);
		
		}

		return false;
	}

	public function borrarCancion($idCliente, $idCancion){
		$borrar = "DELETE FROM canciones_clientes WHERE idCancion=$idCancion AND idCliente=$idCliente;";

		$this->consulta($borrar);

		header("Location: index.php?page=indexUser");
	}
}
?>