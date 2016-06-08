<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerBorrar"></div>

<!-- Si el javaScript valida los campos el formulario hace la accion de darle valor a la variable "action" para que llame a un metodo en index.php -->
<form action="index.php?action=deleteAccount" method="post" id="registro">

			<div class="campo">Constraseña</br><input size="30" name = "password" id="usuario" class="text" type="password" placeholder="Contraseña" required></div>
	
			<div class="campo"> <button class="button" type="submit" value = "Borrar"> Borrar </button> </div>

			<b><div class="info" id="informacion"></div></b>

</form>

<?php 
include("app/view/HFPages/footer.php");
?>