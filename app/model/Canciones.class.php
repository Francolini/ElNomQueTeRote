<?php 

//Se incluye el Database.class.php para poder hacer las consultas
include_once("app/model/Database.class.php");

class Canciones extends Database{

	//La funcion de listar clientes creara un array de canciones donde cada cancion es una fila
	public function listarCanciones(){
		//Se escribe consulta que nos devolvera la tabla de canciones
		$consulta="SELECT c.nombre, a.Nombre, a.apellido, c.idCancion  FROM canciones c, artistas a WHERE c.idArtista=a.idArtista;";
		$canciones = $this->consulta($consulta); //Realiza la consulta
		
		//Convertimos la tabla en un objeto y mientras le queden filas ira añadiendo, a otros arrays (1 por columna), el valor correspondiente de cada columna de uno en uno (Es dificil de explicar)
		while($cancion = mysqli_fetch_object($canciones)) { 
			$cancionesArray[] = $cancion->nombre;
			$artistas[] = $cancion->Nombre;
			$apellidoArtista[] = $cancion->apellido;
			$idCancion[] = $cancion->idCancion;
		}

		//Por ultimo le devolvemos el array al que le asignamos los otros arrays creados en el while
		return array("canciones" => $cancionesArray, "artistas" => $artistas, "apellido" => $apellidoArtista, "idCanciones" => $idCancion);
	}

	//La funcion anyadirCancionesUsuario nos hace un INSERT en la tabla de las canciones favoritas de cada usuario
	public function anyadirCancionesUsuario($id, $lista){

		//En un for se van haciendo los inserts a la base de datos
		for($i = 0; $i < sizeof($lista); $i++){
			$insert = "INSERT INTO canciones_clientes VALUES('$id', '$lista[$i]');";
			$this->consulta($insert);
		}

		//Despues de realizar los inserts se redirige a la pagina principal del perfil para que vea todas las canciones que ha elegido
		header("Location: index.php?page=indexUser");
	}

	//Esta funcion es totalmente la misma que la de listarCanciones, solo que necesita la id del usuario que esta logueado para poder mostras las canciones favoritas de ses usuario, tambien la consulta tiene un DISTINCT por si el usuario se ha equivocado repitiendo alguna cancion a la hora de elegirlas, por ultimo, si el array esta vacio, es decir, si no ha elegido todavia ninguna cancion, devolvera un false
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

	//Al llamar a esta funcion se hace un DELETE y se redirige a la pagina principal del usuario
	public function borrarCancion($idCliente, $idCancion){
		$borrar = "DELETE FROM canciones_clientes WHERE idCancion=$idCancion AND idCliente=$idCliente;";

		$this->consulta($borrar);

		header("Location: index.php?page=indexUser");
	}
}
?>