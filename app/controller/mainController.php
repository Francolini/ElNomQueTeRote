<?php 

//Aqui no hay mucho que explicar, segun el valor de "page" se llamara a un metodo o a otro y cada uno nos enviara a una pagina diferente
function goPrincipal(){
	include("app/view/index.php");
}

function goAbout(){
	include("app/view/pages/about.php");
}

function goRegister(){
	include("app/view/pages/register.php");
}

function goRegisterError(){
	include("app/view/pages/registerError.php");
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

function goSongs(){
	include("app/view/pages/songs.php");
}

function goDeleteAccount(){
	include("app/view/pages/deleteAccount.php");
}

function goDeleteAccountError(){
	include("app/view/pages/deleteAccountError.php");
}

function goChangePassword(){
	include("app/view/pages/changePassword.php");
}

function goChangePasswordError(){
	include("app/view/pages/changePasswordError.php");
}
?>