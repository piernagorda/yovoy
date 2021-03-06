<?php 
include_once('includes/MySQLConnection.php');
include_once('includes/UserDAO.php');
include_once('includes/User.php');
session_start(); 
?>

<!DOCTYPE html>
<html>
    <body>
    <div id="cabecera">   
		<div id="navbar">
			<ul>
				<!--logo aquí-->
				<li><a href='index.html'>INICIO</a></li>
				<li><a href='feed.php'>FEED</a></li>
				<li><a href='eventos.php'>EVENTOS</a></li>
				<li><a href='buscar.php'>BUSCAR</a></li>
				<li><a href='calendario.php'>CALENDARIO</a></li>
				<li><a href='amigos.php'>MIS AMIGOS</a></li>
				<li><a href='profileView.php'>MI ÁREA</a></li>
			</ul>
		</div>
		
		<div id="usuario">
			<?php
				if((isset($_SESSION["login"]) && !$_SESSION["login"]) || !isset($_SESSION["login"])){
					echo "<ul>";
					echo "<li><a href='register.php'>REGISTRARSE</a></li>";
					echo "<li><a href='login.php'>LOGIN</a></li>";
					echo "</ul>";
				}
				else{
					//foto si hay
					if($_SESSION["login"]){
						$mysql = new MySQLConnection();
						$conn = $mysql->connect(); 
						$userDAO = new UserDAO();
						
						$user = $userDAO->getUser($conn, $_SESSION["username"]);
						$imgDir = "includes/img/usuarios/";
						$imgName = $user->getImgName();
						$imgPath = $imgDir . $imgName;
						$name = $user->getName();
						
						echo "<img src='" . $imgPath . "' alt='usuario' height='50' width='50'>";
						echo "<p>Hola, " . $name . "!</p>";
						echo "<a href='includes/logout.php'>Cerrar sesión</a>";
						echo "<p>" . $_SESSION["check"] . "</p>";
						

						//MENSAJE QUE SE MUESTRA A NUEVOS USUARIOS
						if(isset($_SESSION["newUser"])){
							if($_SESSION["newUser"]){
								echo "<h1>AHORA ERES UN USUARIO REGISTRADO!</h1>";
							}
						}   
					}
				}
			?>
		</div>
		
		<div id="usuarioPic">
		</div>
    </div>
    </body>
</html>
