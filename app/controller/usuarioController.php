<?php 

include("app/model/Usuario.class.php");

function register(){
	$usuario=new Usuario();
	$usuario->register($_POST["username"], $_POST["password"]);
}

function login(){
	$usuario=new Usuario();
	$usuario->login($_POST["username"], $_POST["password"]);
}

function logout(){
	session_destroy();
	header("Location: index.php");
}

function deleteAccount(){
	$usuario=new Usuario();
	$usuario->deleteAccount($_SESSION["username"], $_POST["password"]);
}

function changePassword(){
	$usuario=new Usuario();
	$usuario->changePassword($_SESSION["username"], $_POST["password"], $_POST["newPassword"]);
}

?>