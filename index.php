<?php 

// Abrimos una sesion y hacemos un include para cada controlador que se va a utilizar, los controladores de la carpeta "controller" realizan las funciones necesarias para que el usuario pueda registrarse, iniciar sesion y modificar su cuenta, mientras que el modelo se conecta con la base de datos para realizar las consultas, borrados, creaciones o modificaciones de la base de datos, acciones que seran llamadas desde el controlador.

session_start();
include("app/controller/mainController.php");
include("app/controller/cancionesController.php");
include("app/controller/usuarioController.php");

// Por defecto llamará al metodo "goPrincipal()", metodo que se encuentra en el "mainController.php" de la carpeta "controller"

if(empty($_GET)){
	goPrincipal();
}else{

// Si "index.php?action="(lo que sea)"" no hara el metodo "goPrincipal()" ya que $_GET no estará vacio y tendrá un valor

	//En "action" se realizan los metodos que se llaman desde cada formulario, se llamaran desde cancionesController.php y usuarioController.php
	if(isset($_GET["action"])){
		switch ($_GET["action"]){

			// Si action="register" llamará al metodo "register()", como se trata de la gestion de un usuario, este metodo se encuentra en usuarioController.php
			case "register":

			register();

			break;

			// Si action="login" llamará al metodo "logIn()", como se trata de la gestion de un usuario, este metodo se encuentra en usuarioController.php
			case "login":

			logIn();

			break;

			// Si action="logout" llamará al metodo "logout()", como se trata de la gestion de un usuario, este metodo se encuentra en usuarioController.php
			case "logout":

			logout();

			break;

			// Si action="deleteAccount" llamará al metodo "deleteAccount()", como se trata de la gestion de un usuario este metodo se encuentra en usuarioController.php
			case "deleteAccount":

			deleteAccount();

			break;


			// Si action="addSongs" llamará al metodo "addSongs()", como se trata de la gestion de canciones, este metodo se encuentra en cancionesController.php
			case "addSongs":

			addSongs();

			break;


			// Si action="changePassword" llamará al metodo "changePassword()", como se trata de la gestion de un usuario este metodo se encuentra en usuarioController.php
			case "changePassword":

			changePassword();

			break;

			// Si action="borrarCancion" llamará al metodo "borrarCancion()", como se trata de la gestion de canciones, este metodo se encuentra en cancionesController.php
			case "borrarCancion":

			//Este metodo borra una cancion FAVORITA de un usuario, ya que los usuarios no pueden añadir canciones a la base de datos de la página pero sí elegir sus favoritas, para poder borrarle a un usuario una cancion en concreto debemos saber la id de dicha cancion
			$id = $_GET["id"];
			borrarCancion($id);

			break;

		}
	}

	//Aqui en vez de "action" es "page", en cada caso se llamara a un metodo desde el mainController, que sera el que redirija, segun el metodo con el que se haya llamado, a una pagina o a otra
	if(isset($_GET["page"])){
		switch ($_GET["page"]){
			case "register":

			goRegister();

			break; 

			case "login":

			goLogin();

			break;

			case "indexUser":

			goIndexUser();

			break;

			case "loginError":

			goLoginError();

			break;

			case "songs":

			goSongs();

			break;

			case "deleteAccount";

			goDeleteAccount();

			break;

			case "deleteAccountError";

			goDeleteAccountError();

			break;

			case "changePassword":

			goChangePassword();

			break;

			case "changePasswordError":

			goChangePasswordError();

			break;

			case "registerError":

			goRegisterError();

			break;

			//Si se hace una page="asldkaskjdbasd", al no existir ese caso, nos enviara a la pagina principal de la web
			default:

			goPrincipal();

			break;
		}
	}
}
?>