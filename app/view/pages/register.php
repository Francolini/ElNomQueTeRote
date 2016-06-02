<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerRegistro"></div>

<form action="index.php?action=register" method="post" id="registro">

			<div  class="formulario"> <input name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario"></div>
		
			<div  class="formulario"> <input name = "password" id="pass" class="text" type="password" placeholder="Contraseña"></div>

			<div  class="formulario"> <input name = "confirmPassword" id="repPass" class="text" type="password" placeholder="Confirmar contraseña"></div>

			<div class="formulario"><button type = "button" value = "Regístrate" onclick="validaRegistro();"> Registrarse </button></div>

			<b><div id="informacion"  class="formulario"></div></b>

</form>
  
<script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>