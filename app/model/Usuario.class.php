<?php 

// Se hace un include a Database.class.php, que será clave para poder realizar cada una de las consultas o modificaciones a la base de datos
include_once("app/model/Database.class.php");

//Se crea la clase Usuario que realizara las consultas para la tabla de los usuarios o las que esten relacionados con ellos si es necesario, esta clase es una clase hija de Database.
class Usuario extends Database{

	//La funcion register() es la que registrará al usuario pero antes debe comprobar si el nombre de usuario ya existe, si el nombre de usuario ya existe no dejará crear dicho nuevo perfil
	public function register($usuario, $contraseña){
		$contraseña2 = md5($contraseña); //Por seguridad, se encripta la contraseña con md5()
		$registro="INSERT INTO clientes(usuario, contrasena) VALUES('$usuario', '$contraseña2');"; //La consulta que realizará el registro
		$comprobar="SELECT usuario FROM clientes WHERE usuario='$usuario';"; //La consulta que comprobará si ese usuario ya existe

		if($usuario = $this->consulta($comprobar)){ //Realiza la funcion consulta() de Dtabase.class.php, esta consulta comprueba primero si existe el 											   usuario
			if(mysqli_num_rows($usuario)){ //Si la tabla de la comprobacion nos devuelve 1 fila significa que el nombre de usuario ya existe y que 								   deberá elegir otro nombre
				header('Location: index.php?page=registerError'); //Acto seguido se le redirige a registerError.php, cuyo contenido es exactamente el 													mismo que register.php pero con un mensaje avisando al usuario que ese nombre ya 													  está en uso
			}else{
				$this->consulta($registro); //Si no existe se añade el nuevo usuario a la base de datos
				login($usuario, $contraseña); //Y luego se llama a la funcion login() para loguearse automaticamente para no tener que entrar dos 								  veces seguidas
			}
		}
		
	}

	//La funcion login() será la responsable de loguear al usuario a la web
	public function login($usuario, $contraseña){
		$contraseña = md5($contraseña); //Encriptamos la contraseña
		$login="SELECT usuario, contrasena, idCliente FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';"; //La consulta que usaremos para comprobar si existe dicho ususario

		if($usuario = $this->consulta($login)){ //Se conecta con la base de datos y hace la consulta

			if(mysqli_num_rows($usuario)){ //Como antes, si la consulta devuelve almenos una fila logueará, sino pues no
				$usuario = mysqli_fetch_assoc($usuario); //Devuelve una fila de fila de resultados como un array asociativo
				$_SESSION["username"] = $usuario["usuario"]; //Se crea la variable $_SESSION["username"] por si la necesitamos en algun momento
				$_SESSION["idCliente"] = $usuario["idCliente"]; //Lo mismo que antes pero en la id del usuario
				header('Location: index.php?page=indexUser'); //Se redirige a la pagina principal del usuario
			}else{
				header('Location: index.php?page=loginError');//Si no existe el usuario se redirige a la pagina "loginError", que, al igual que el 												  registerError, es lo mismo que login pero con un mensaje en el que pone que ese usuario 												no existe
			}
			
		}
		
	}

	//La funcion deleteAccount() borrará la cuenta del usuario, pero solo si la contraseña que ha escribido el usuario es la misma que la de la sesion actual
	public function deleteAccount($usuario, $contraseña){
		$contraseña = md5($contraseña); //Se encripta la contraseña
		$consultar="SELECT usuario, contrasena FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';"; //La consulta que comprobara si la contraseña introducida es la del usuario logueado
		$borrar="DELETE FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';"; //La consulta que borrara al usuario en caso de que la contraseña sea la correcta

		if($usuario = $this->consulta($consultar)){ //Se hace la consulta
			if(mysqli_num_rows($usuario)){ //Si devuelve almenos 1 fila significara que la contraseña de ese exacto usuario existe
				$this->consulta($borrar); //Se borra la sesion
				header('Location: index.php?action=logout'); //Y se regirige a la pagina "logout.php"
			}else{
				header('Location: index.php?page=deleteAccountError'); //En caso contrario se redirige a "deleteAccountError", mismo caso que loginError y registerError
			}
			
		}
	}

	//La funcion changePassword() modificara la contraseña del usuario, pero, como en deleteAccount(), deberá comprobarse que la contraseña sea la correcta
	public function changePassword($usuario, $contraseña, $nuevaContraseña){
		$contraseña = md5($contraseña); //Se encripta la contraseña antigua
		$nuevaContraseña = md5($nuevaContraseña); //Se encripta la nueva
		$consultar="SELECT usuario, contrasena FROM clientes WHERE usuario='$usuario' AND contrasena='$contraseña';"; //Consulta para comprobar que sea correcta la contraseña
		$cambiar="UPDATE clientes SET contrasena='$nuevaContraseña' WHERE usuario='$usuario' AND contrasena='$contraseña';"; //La consulta que reemplazara con un UPDATE la nueva contraseña con la antigua

		//Y este if es totalmente el mismo que el de deleteAccount() pero en vez de borrar, si todo va bien se redirige a la pagina principal del ususario y si algo falla se envia a la pagina "changePasswordError"
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