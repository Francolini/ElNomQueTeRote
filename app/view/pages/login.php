<?php 
include("app/view/HFPages/header.php");
?>

<form action="index.php?action=login" method="post" id="registro">

			<div><input name = "username" id="usuario" class="text" type="text" placeholder="Nombre de usuario"></div>
		
			<div> <input name = "password" id="pass" class="text" type="password" placeholder="Contraseña"></div>
	
			<button class="button" type = "button" value = "Logueate" onclick="validaLogin();"> Loguearse </button>

			<div id="informacion"></div>

</form>

  
<script type="text/javascript" src="app/view/js/validaciones.js"></script>

<?php 
include("app/view/HFPages/footer.php");
?>