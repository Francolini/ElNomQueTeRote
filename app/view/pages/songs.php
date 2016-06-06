<?php 
include("app/view/HFPages/header.php");
?>

<form action="index.php?action=addSongs" method="post">
	<select id="select">

	<?php 
	echo listarCanciones();
	?>

	</select>

	<button type="button" class="buttonAdd" onclick="anyadirCanciones();"> Añadir cancion </button>
	<input type="submit" class="buttonAdd" value="Elegir canciones"/>

	<div id="cancionesUsuario"></div>

</form>

<script type="text/javascript" src="app/view/js/anyadirCanciones.js">
</script>



<?php 
include("app/view/HFPages/footer.php");
?>