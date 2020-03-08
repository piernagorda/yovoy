<!DOCTYPE html>
<html>
    <body>
    <div id="cabecera">   
        <h1>ESTO ES UNA PRUEBA</h1>
		
		<div id="navbar">
			<ul>
				<!--logo aquí-->
				<li><a href='feed.php'>FEED</a></li>
				<li><a href='eventos.php'>EVENTOS</a></li>
				<li><a href='buscar.php'>BUSCAR</a></li>
				<li><a href='calendario.php'>CALENDARIO</a></li>
				<li><a href='amigos.php'>MIS AMIGOS</a></li>
				<li><a href='area.php'>MI ÁREA</a></li>
			</ul>
		</div>
		
		<div id="usuario">
			<?php
				if(!isset($_SESSION["login"])){
					echo "<ul>";
					echo "<li><a href='register.php'>REGISTRARSE</a></li>";
					echo "<li><a href='login.php'>LOGIN</a></li>";
					echo "</ul>";
				}
				else{
					//foto si hay
					if($_SESSION["login"]){
						echo "<p>Hola, " . $_SESSION["username"]. "!</p>";
						echo "<a href='logout.php'>Cerrar sesión</a>";

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