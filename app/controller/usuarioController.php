<?php 

// Para empezar hacemos un include a "Usuario.class.php" que sera el modelo que consultara la tabla de los usuarios en la base de datos 
include("app/model/Usuario.class.php");

// Al llamar la funcion register() creamos una variable de clase Usuario y llamamos al metodo register(*, *), pasandole el valor del atributo "name" de las etiquetas correspondientes (con $_POST["(valor del atributo name)"] y con method="post" del formulario)
function register(){
	$usuario=new Usuario();
	$usuario->register($_POST["username"], $_POST["password"]);
}

//Lo mismo para register()
function login(){
	$usuario=new Usuario();
	$usuario->login($_POST["username"], $_POST["password"]);
}

//En logout se cierra la sesion y se redirige a la pagina principal
function logout(){
	session_destroy();
	header("Location: index.php");
}

//Lo mismo para register(), solo que se pasa el nombre de usuario de la sesion actual para comprobar que la contraseña sea la del usuario que esta logueado en ese momento
function deleteAccount(){
	$usuario=new Usuario();
	$usuario->deleteAccount($_SESSION["username"], $_POST["password"]);
}

//Lo mismo para register(), solo que se pasa el nombre de usuario de la sesion actual para comprobar que la contraseña sea la del usuario que esta logueado en ese momento
function changePassword(){
	$usuario=new Usuario();
	$usuario->changePassword($_SESSION["username"], $_POST["password"], $_POST["newPassword"]);
}

?>