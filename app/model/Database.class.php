<?php 
//Se crea la clase Database
class Database{
	protected $conexion;

	//La funcion conectar() simplemente conecta la base de datos al realizar una consulta o modificacion, si falla en el proceso envia mensaje de error
	protected function conectar(){
		$this->conexion=mysqli_connect("localhost", "root", "", "karisma") or die("Error al conectar con la base de datos.".mysqli_connect_error());
	}

	//La funcion consulta() realiza una consulta que se pasará por parámetro desde los otros modelos para sacar la informacion que se pide, primero se conecta a la base de datos, realiza la consulta creando una variable $resultado, se desconecta de la base de datos y acto seguido devuelve el resultado de la consulta.
	protected function consulta($consulta){
		$this->conectar();
		$resultado=mysqli_query($this->conexion, $consulta);
		$this->desconectar();
		return $resultado;
	}

	//La funcion desconectar() es la que realiza la desconexion de la base de datos.
	protected function desconectar(){
		mysqli_close($this->conexion);
	}
}
?>