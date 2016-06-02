<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerLogin"></div>

<form action="index.php?action=login" method="post" id="registro">

			<div class="formulario"><input name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario"></div>
		
			<div class="formulario"> <input name = "password" id="pass" class="text" type="password" placeholder="Contraseña"></div>
	
			<div class="formulario"> <button class="button" value = "Logueate" onclick="validaLogin();"> Loguearse </button> </div>

			<b><div class="formulario" id="informacion"></div></b>

</form>

  <script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>