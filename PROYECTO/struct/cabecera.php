<!DOCTYPE html>
<html>
    <body>
    <div id="cabecera">   
        <h1>ESTO ES UNA PRUEBA</h1>
		
		<div id="logo">
		</div>
		
		<div id="feedLink">
			<a href='feed.php'>FEED</a>
		</div>
		
		<div id="eventosLink">
			<a href='eventos.php'>EVENTOS</a>
		</div>
		
		<div id="buscarLink">
			<a href='buscar.php'>BUSCAR</a>
		</div>
		
		<div id="calendarioLink">
			<a href='calendario.php'>CALENDARIO</a>
		</div>
		
		<div id="amigosLink">
			<a href='amigos.php'>MIS AMIGOS</a>
		</div>
		
		<div id="areaLink">
			<a href='area.php'>MI ÁREA</a>
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