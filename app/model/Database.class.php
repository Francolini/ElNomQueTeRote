<?php 
class Database{
	protected $conexion;

	protected function conectar(){
		$this->conexion=mysqli_connect("localhost", "root", "", "karisma") or die("Error al conectar con la base de datos.".mysqli_connect_error());
	}

	protected function consulta($consulta){
		$this->conectar();
		$resultado=mysqli_query($this->conexion, $consulta);
		$this->desconectar();
		return $resultado;
	}

	protected function desconectar(){
		mysqli_close($this->conexion);
	}
}
?>