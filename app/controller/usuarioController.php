<?php 

include("app/model/Usuario.class.php");

function register(){
	$usuario=new Usuario();
	$usuario->register($_POST["username"], $_POST["password"]);
	header('Location: index.php?page=indexUser');
}

function login(){
	$usuario=new Usuario();
	$usuario->login($_POST["username"], $_POST["password"]);
}

?>