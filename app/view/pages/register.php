<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerRegistro"></div>

<!-- Si el javaScript valida los campos el formulario hace la accion de darle valor a la variable "action" para que llame a un metodo en index.php -->
<form action="index.php?action=register" method="post" id="registro" onsubmit="return validaRegistro();">

			<div class="campo">Nombre de usuario</br><input size="30" name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario" required></div>
		
			<div class="campo">Contraseña</br><input size="30" name = "password" id="pass" class="text" type="password" placeholder="Contraseña" required></div>

			<div  class="campo">Repita contraseña</br> <input size="30" name = "confirmPassword" id="repPass" class="text" type="password" placeholder="Confirmar contraseña" required></div>

			<div class="campo"><button class="button" type="submit" value="Regístrate" > Registrarse </button></div>

			<b><div id="informacion" class="formulario"></div></b>

</form>
  
<script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>