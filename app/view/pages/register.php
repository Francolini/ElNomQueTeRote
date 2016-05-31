<?php 
include("app/view/HFPages/header.php");
?>

<form action="index.php?action=register" method="post" id="registro">

			<div><input name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario"></div>
		
			<div> <input name = "password" id="pass" class="text" type="password" placeholder="Contraseña"></div>

			<div> <input name = "confirmPassword" id="repPass" class="text" type="password" placeholder="Confirmar contraseña"></div>

			<button class="button" type = "button" value = "Regístrate" onclick="validaRegistro();"> Registrarse </button>

			<div id="informacion"></div>

</form>

  
<script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>