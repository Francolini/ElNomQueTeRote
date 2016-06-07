<?php

if(isset($_SESSION["username"])) {
  $username = 'Bienvenido <a href="index.php?page=indexUser"> '.$_SESSION["username"].'</a>
                  <ul>
                    <li><a href="index.php?action=logout">Salir</a></li>
                    <li><a href="index.php?page=deleteAccount">Borrar Cuenta</a></li>
                    <li><a href="index.php?page=changePassword">Cambiar pass</a></li>
                  </ul>';
}
else {
  $username = '<a href="index.php?page=login">Iniciar Sesión</a>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

	<head>

		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="app/view/css/estilo.css"/>
		<script type="text/javascript" src="app/view/js/validaciones.js"></script>

	</head>

	<body>

	 <header class = "menu">
      <ul>
        <li><a href="index.php">Karisma</a></li>
        <li><a href="index.php?page=about"> Quienes somos </a></li>

        <?php  

        if(!isset($_SESSION["username"])){
          echo '<li><a href="index.php?page=register"> Registrarse </a></li>';
        }

        ?>

        <?php  

        if(isset($_SESSION["username"])){
          echo '<li><a href="index.php?page=songs"> Canciones </a></li>';
        }

        ?>

        <li class="userMenu">
        <?php echo $username ?>
        </li> 
                 
      </ul>
    </header>