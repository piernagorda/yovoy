<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Yovoy</title>
</head>

<body>
    <header>
        <?php include 'includes/comun/cabecera.php' ?>
    </header>

    <div>
        <h1>Login de usuario</h1> 

        <form method = "post" action="<?php echo htmlspecialchars("includes/loginSubmit.php");?>">
            <ul>
                <li>Usuario <input type="text" name="username"/></li>
                <li>Contraseña <input type="password" name="password"/></li>
                <li><input type="submit" value="Login"></li>
            </ul>
        </form>
            
        <?php 
            if(isset($_SESSION["login"])){
                if(!$_SESSION["login"]){
                    echo '<p>Autenticación no válida</p>';
                        
                    if(!$_SESSION["userInDB"])
                        echo '<p>Usuario no existente.</p>';
                    else if(!$_SESSION["correctPass"]){
                        echo '<p>Contraseña incorrecta</p>';
                    }

                    session_destroy();
                }
            }
        ?>
    </div>
 
    <footer>
        <?php include 'includes/comun/pie.php' ?>
    </footer>
</body>
</html>
