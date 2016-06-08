<?php 
include_once("app/model/Database.class.php");
class Usuario extends Database{

	public function register($usuario, $contraseña){
		$contraseña2 = md5($contraseña);
		$registro="INSERT INTO clientes(usuario, contrasena) VALUES('$usuario', '$contraseña2');";
		$comprobar="SELECT usuario FROM clientes WHERE usuario='$usuario';";

		if($usuario = $this->consulta($comprobar)){
			if(mysqli_num_rows($usuario)){
				header('Location: index.php?page=registerError');
			}else{
				$this->consulta($registro);
				login($usuario, $contraseña);
			}
		}
		
	}

	public function login($usuario, $contraseña){
		$contraseña = md5($contraseña);
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
		$contraseña = md5($contraseña);
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

	public function changePassword($usuario, $contraseña, $nuevaContraseña){
		$contraseña = md5($contraseña);
		$nuevaContraseña = md5($nuevaContraseña);
		$consultar="SELECT usuario, contrasena FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';";
		$cambiar="UPDATE clientes SET contrasena='$nuevaContraseña' WHERE usuario='$usuario' AND contrasena='$contraseña';";

		if($usuario = $this->consulta($consultar)){
			if(mysqli_num_rows($usuario)){
				$this->consulta($cambiar);
				header('Location: index.php?page=indexUser');
			}else{
				header('Location: index.php?page=changePasswordError');
			}
			
		}
	}
}
?>