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
		$login="SELECT usuario, contrasena, idCliente FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';";

		if($usuario = $this->consulta($login)){
			if(mysqli_num_rows($usuario)){
				$usuario = mysqli_fetch_assoc($usuario);
				$_SESSION["username"] = $usuario["usuario"];
				$_SESSION["idCliente"] = $usuario["idCliente"];
				header('Location: index.php?page=indexUser');
			}else{
				header('Location: index.php?page=loginError');
			}
			
		}
		
	}

	public function deleteAccount($usuario, $contraseña){
		$consultar="SELECT usuario, contrasena FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';";
		$borrar="DELETE FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';";

		if($usuario = $this->consulta($consultar)){
			if(mysqli_num_rows($usuario)){
				$this->consulta($borrar);
				header('Location: index.php?action=logout');
			}else{
				header('Location: index.php?page=deleteAccountError');
			}
			
		}
	}
}
?>