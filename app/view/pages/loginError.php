<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerLogin"></div>

<form action="index.php?action=login" method="post" id="registro" onsubmit="return validaLogin();">

			<div class="campo">Nombre de usuario</br><input size="30" name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario" required></div>
		
			<div class="campo">Contraseña</br><input size="30" name = "password" id="pass" class="text" type="password" placeholder="Contraseña" required></div>
	
			<div class="campo"> <button class="button"  typpe="submit" value = "Logueate"> Iniciar sesión </button> </div>

			<b><div class="info" id="informacion"> El usuario o la constraseña no son correctos </div></b>

</form>

  <script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>