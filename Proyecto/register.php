<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Registro - Yovoy</title>
</head>
<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
        <h1>REGISTRARSE</h1>
        <form method="post" action="<?php echo htmlspecialchars("includes/registerSubmit.php");?>">
            <ul>
                <li>Usuario <input type="text" name="username"/></li>
                <li>Contraseña <input type="password" name="password"/></li>
                <li>Confirme contraseña <input type="password" name="passwordConfirm"/></li>
                <li>Nombre <input type="text" name="name"/></li>
                <li>Foto <input type="file" accept =".png, .jpg, .jpeg" name="img"/></li>
                <li><input type="submit" value="Registrarse"/></li>
				<li><input type="reset" value="Borrar Campos"></li>

                <?php 
                    if(isset($_SESSION["validPass"])){
                        if(!$_SESSION["validPass"])
                            echo "<p>Las contraseñas no coinciden.</p>";
                    }

                    if(isset($_SESSION["noBlanks"])){
                        if(!$_SESSION["noBlanks"]){
                            echo "<p>Rellene todos los campos.</p>";
                        }
                    }

                    if(isset($_SESSION["userInDB"])){
                        if($_SESSION["userInDB"]){
                            echo "<p>El nombre de usuario ya está en uso.</p>";
                        }
                    }
                ?>
                
            </ul>
        </form>
    </div>

    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
