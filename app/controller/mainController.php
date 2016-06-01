<?php 
function goPrincipal(){
	include("app/view/index.php");
}

function goAbout(){
	include("app/view/pages/about.php");
}

function goRegister(){
	include("app/view/pages/register.php");
}

function goLogin(){
	include("app/view/pages/login.php");
}

function goIndexUser(){
	include("app/view/pages/indexUser.php");
}

function goLoginError(){
	include("app/view/pages/loginError.php");
}
?>