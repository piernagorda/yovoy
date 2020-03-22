<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Ver Perfil - Yovoy</title>
</head>
<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
		<?php
			if(isset($_SESSION["login"]) && $_SESSION["login"]){
				// hacer un query para conseguir información sobre el usuario
				
				// foto del usuario (poner defaultUser.jpg si no hay)
				
				// mostrar información sobre el usuario
				
				// botón para editar el perfil
				
				// botón para cambiar la contraseña
			}
			else{
				echo "<p>Aún no eres un usuario registrado. <a href='login.php'>Login</a> o <a href='register.php'>registrarse</a>.</p>"
			}
		?>
    </div>

    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
