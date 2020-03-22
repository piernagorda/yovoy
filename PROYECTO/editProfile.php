<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Perfil - Yovoy</title>
</head>

<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
        <h1>Login de usuario</h1> 

        <form method = "post" action="<?php echo htmlspecialchars("includes/editProfileSubmit.php");?>">
            <ul>
                <li>Nombre <input type="text" name="nombre"/></li>
                <li>Foto <input type="file" accept =".png, .jpg, .jpeg" name="img"/></li>
                <li><input type="submit" value="Confirmar"></li>
				<li><input type="reset" value="Borrar Campos"></li>
            </ul>
        </form>
    </div>
 
    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
