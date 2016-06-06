<?php 
session_start();
include("app/controller/mainController.php");
include("app/controller/cancionesController.php");
include("app/controller/usuarioController.php");

if(empty($_GET)){
	goPrincipal();
}else{

	if(isset($_GET["action"])){
		switch ($_GET["action"]){
			case "register":

			register();

			break;

			case "login":

			logIn();

			break;

			case "logout":

			logout();

			break;

			case "deleteAccount":

			deleteAccount();

			break;

			case "addSongs":

			addSongs();

			break;

		}
	}

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

			case "modPassword":

			goModPassword();

			break;

			default:

			goPrincipal();

			break;
		}
	}
}
?>