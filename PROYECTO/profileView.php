<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <link href="estilos.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <title>Ver Perfil - YoVoY</title>
</head>
<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
		<?php
			if(isset($_SESSION["login"]) && $_SESSION["login"]){
				// foto
				
				// mostrar información
				
				// botón para editar perfil
				
				// botón para cambiar contraseña
				
			}
		?>
    </div>

    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
