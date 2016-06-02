<?php 
include_once("app/model/Database.class.php");
class Usuario extends Database{

	public function register($usuario, $contraseña){
		$registro="INSERT INTO clientes(usuario, contrasena) VALUES('$usuario', '$contraseña');";

		if($this->consulta($registro)){
			return true;
		}

		return false;
	}

	public function login($usuario, $contraseña){
		$login="SELECT usuario, contrasena FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';";

		if($usuario = $this->consulta($login)){
			if(mysqli_num_rows($usuario)){
				$_SESSION["username"] = mysqli_fetch_assoc($usuario)["usuario"];
				header('Location: index.php?page=indexUser');
			}else{
				header('Location: index.php?page=loginError');
			}
			
		}
		
	}
}
?>