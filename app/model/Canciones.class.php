<?php 
include_once("app/model/Database.class.php");
class Canciones extends Database{

	public function listarCanciones(){
		$consulta="SELECT nombre FROM canciones;";

		return mysqli_fetch_array($this->consulta($consulta), MYSQLI_NUM);
	}
}
?>