<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <link href="estilos.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <title>Ver Perfil - YoVoY</title>
	<script>
        function editar(){
            window.location.href = "editProfile.php";
        }
		
		function contrasena(){
            window.location.href = "changePassword.php";
        }
    </script>
</head>
<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
		<?php
			if(isset($_SESSION["login"]) && $_SESSION["login"]){
				$mysql = new MySQLConnection();
				$conn = $mysql->connect(); 
				$userDAO = new UserDAO();
				
				// conseguir información
				$user = $userDAO->getUser($conn, $_SESSION["username"]);
				
				// foto
				$imgDir = "includes/img/usuarios/";
				$imgName = $user->getImgName();
				$imgPath = $imgDir . $imgName;
				echo "<img src='" . $imgPath . "' alt='usuario' height='200' width='200'>";
				
				// mostrar información
				$name = $user->getName();
				$type = $user->getUserType();
				if ($type == "0"){
					$type = "Administrador";
				}
				else if ($type == 1){
					$type = "Usuario Regular";
				}
				else{
					$type = "Usuario Premium";
				}
				$creationDate = $user->getCreationDate();
				$email = $user->getEmail();
				
				echo "<p>" . $name . "</p>";
				echo "<p>" . $type . "</p>";
				echo "<p>Se unió " . $creationDate . "</p>";
				echo "<p>" . $email . "</p>";
				
				// botón para editar perfil
				echo  "<input type='button' value='Editar Perfil' onclick='editar();' />";
				
				// botón para cambiar contraseña
				echo  "<input type='button' value='Cambiar Contraseña' onclick='contrasena();' />";
				
			}
		?>
    </div>

    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
