<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerCambiar"></div>

<form action="index.php?action=changePassword" method="post" id="registro">

			<div class="campo">Constraseña</br><input size="30" name = "password" id="usuario" class="text" type="password" placeholder="Contraseña" required></div>

			<div class="campo">Nueva contraseña</br><input size="30" name = "newPassword" id="usuario" class="text" type="password" placeholder="Nueva Contraseña" required></div>
	
			<div class="campo"> <button class="button" type="submit" value = "Cambiar"> Cambiar </button> </div>

			<b><div class="info" id="informacion"></div></b>

</form>

<?php 
include("app/view/HFPages/footer.php");
?>