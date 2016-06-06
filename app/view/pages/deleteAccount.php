<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerBorrar"></div>

<form action="index.php?action=deleteAccount" method="post" id="registro">

			<div class="campo">Constraseña</br><input size="30" name = "password" id="usuario" class="text" type="password" placeholder="Contraseña" required></div>
	
			<div class="campo"> <button class="button" type="submit" value = "Borrar"> Borrar </button> </div>

			<b><div class="info" id="informacion"></div></b>

</form>

<?php 
include("app/view/HFPages/footer.php");
?>