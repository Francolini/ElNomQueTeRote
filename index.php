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

			default:

			goPrincipal();

			break;
		}
	}
}
?>