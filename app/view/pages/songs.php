<?php 
include("app/view/HFPages/header.php");
?>

<div class="bannerSongs"></div>

<h4> Nota: Haz click encima de una cancion elegida para borrarla</h4>

<form class="formulario" action="index.php?action=addSongs" method="post">
	<select id="select">

	<?php 
	//Se llama al metodo listarCanciones(), se encuentra en el controlador de canciones, cancionesController.php
	echo listarCanciones();
	?>

	</select>

	<!-- Al hacer click en el boton de Añadir cancion, mediante JavaScript, se van añadiendo en un div, el cual dentro de ese div hay otro div, con la funcion remove() que al hacerle click se elimina, con el nombre de la cancion y un input oculto que guarda los datos de  la cancion elegida-->
	<button type="button" class="button" onclick="anyadirCanciones();"> Añadir cancion </button>
	<input type="submit" class="button" value="Elegir canciones"/>

	<div id="cancionesUsuario"></div>

</form>

<script type="text/javascript" src="app/view/js/anyadirCanciones.js">
</script>

<?php 
include("app/view/HFPages/footer.php");
?>