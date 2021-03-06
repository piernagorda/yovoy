<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="estilos.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
	<title>Editar Perfil - YoVoy</title>
</head>

<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
        <h1>Login de usuario</h1> 

        <form method = "post" action="<?php echo htmlspecialchars("includes/editProfileSubmit.php");?>" enctype="multipart/form-data">
            <ul>
                <li>Nombre <input type="text" name="name"/></li>
                <li>Foto <input type="file" accept =".png, .jpg, .jpeg" name="img"/></li>
                <li><input type="submit" value="Confirmar"></li>
				<li><input type="reset" value="Borrar Campos"></li>
            </ul>
        </form>
		
		<?php
			if (isset($_SESSION["editProfileStatus"])){
				echo "<p>" . $_SESSION["editProfileStatus"] . "</p>";
				unset($_SESSION["editProfileStatus"]);
			}
		?>
    </div>
 
    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
